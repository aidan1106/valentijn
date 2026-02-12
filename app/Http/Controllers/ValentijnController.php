<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValentijnController extends Controller
{
    public function index()
    {
        return view('valentijn.index');
    }

    public function planning(Request $request)
    {
        $validated = $request->validate([
            'volgorde' => 'required|array|min:1',
            'duur_film' => 'nullable|integer|min:15',
            'duur_games' => 'nullable|integer|min:15',
            'duur_karaoke' => 'nullable|integer|min:15',
            'film_type' => 'nullable|string',
            'film_keuze' => 'nullable|string',
            'games_keuzes' => 'nullable|array|max:6',
            'karaoke_keuze' => 'nullable|string',
        ]);

        $volgorde = $request->input('volgorde', []);
        $customDurations = [
            'film' => $request->input('duur_film', 120),
            'games' => $request->input('duur_games', 120),
            'karaoke' => $request->input('duur_karaoke', 45),
        ];

        $subOpties = [
            'film_type' => $request->input('film_type'),
            'film_keuze' => $request->input('film_keuze'),
            'games_keuzes' => $request->input('games_keuzes', []),
            'karaoke_keuze' => $request->input('karaoke_keuze'),
        ];

        // Vaste starttijd 14:00
        $starttijd = '14:00';

        // Bereken tijdsindeling
        $planning = $this->berekenPlanning($volgorde, $starttijd, $subOpties, $customDurations);

        return view('valentijn.planning', compact('planning', 'volgorde', 'starttijd', 'subOpties'));
    }

    public function activiteit($type, Request $request)
    {
        $activiteiten = [
            'film' => [
                'titel' => 'Film/Serie Kijken',
                'icon' => '🎬',
                'duur' => 120,
            ],
            'eten' => [
                'titel' => 'Zelfde Gerecht Koken',
                'icon' => '🍽️',
                'duur' => 120,
            ],
            'games' => [
                'titel' => 'Spelletjes Spelen',
                'icon' => '🎮',
                'duur' => 120,
            ],
            'karaoke' => [
                'titel' => 'Karaoke & Quiz',
                'icon' => '🎤',
                'duur' => 45,
            ],
        ];

        if (!isset($activiteiten[$type])) {
            abort(404);
        }

        return view('valentijn.activiteit', [
            'type' => $type,
            'activiteit' => $activiteiten[$type]
        ]);
    }

    private function berekenPlanning($volgorde, $starttijd, $subOpties, $customDurations)
    {
        // Eten is VAST op 18:00 voor 90 minuten
        $etenStart = '18:00';
        $etenEind = '20:00';

        // Bepaal wat voor eten komt
        $vooretenActiviteiten = [];

        foreach ($volgorde as $activiteit) {
            if ($activiteit !== 'eten') {
                $vooretenActiviteiten[] = $activiteit;
            }
        }

        $planning = [];
        $huidigetijd = strtotime('14:00');

        // Bereken activiteiten VOOR eten
        foreach ($vooretenActiviteiten as $activiteit) {
            $item = $this->buildActivityItem(
                $activiteit,
                $huidigetijd,
                $subOpties,
                $customDurations[$activiteit] ?? null
            );
            if ($item) {
                $planning[] = $item;
                $huidigetijd = strtotime($item['eindtijd']);
            }
        }

        // Voeg ETEN toe
        $planning[] = [
            'type' => 'eten',
            'titel' => 'Zelfde Gerecht Koken',
            'icon' => '🍽️',
            'starttijd' => '18:00',
            'eindtijd' => '20:00',
            'duur' =>120,
        ];

        // Bereken activiteiten NA eten (begin van 19:30)
        $huidigetijd = strtotime('20:00');

        // Sorteren: eerst vooreaten, dan eten, dan naeaten
        // Nu voegen we nog eens toe wat anders moet (als er nog wat over is)
        foreach ($volgorde as $activiteit) {
            if ($activiteit !== 'eten' && !in_array($activiteit, $vooretenActiviteiten)) {
                $item = $this->buildActivityItem(
                    $activiteit,
                    $huidigetijd,
                    $subOpties,
                    $customDurations[$activiteit] ?? null
                );
                if ($item) {
                    $planning[] = $item;
                    $huidigetijd = strtotime($item['eindtijd']);
                }
            }
        }

        return $planning;
    }

    private function buildActivityItem($activiteit, $starttijd, $subOpties, $customDuur = null)
    {
        $titels = [
            'film' => 'Film/Serie Kijken',
            'games' => 'Spelletjes Spelen',
            'karaoke' => 'Karaoke & Quiz',
        ];

        $icons = [
            'film' => '🎬',
            'games' => '🎮',
            'karaoke' => '🎤',
        ];

        // Gebruik custom duur als opgegeven, anders bereken standaard
        $duur = $customDuur ?? 0;

        if ($duur <= 0) {
            if ($activiteit === 'film') {
                $duur = 120;
            } elseif ($activiteit === 'games') {
                $duur = 120;
            } elseif ($activiteit === 'karaoke') {
                $duur = 45;
            }
        }

        if ($duur <= 0) {
            return null;
        }

        $starttijdString = date('H:i', $starttijd);
        $eindtijd = $starttijd + ($duur * 60);
        $eindtijdString = date('H:i', $eindtijd);

        $item = [
            'type' => $activiteit,
            'titel' => $titels[$activiteit] ?? '',
            'icon' => $icons[$activiteit] ?? '',
            'starttijd' => $starttijdString,
            'eindtijd' => $eindtijdString,
            'duur' => $duur,
        ];

        // Voeg subopties toe
        if ($activiteit === 'film') {
            if (!empty($subOpties['film_type'])) {
                $item['film_type'] = $subOpties['film_type'];
            }
            if (!empty($subOpties['film_keuze'])) {
                $item['film_keuze'] = $subOpties['film_keuze'];
            }
        } elseif ($activiteit === 'games') {
            // Bepaal welke platforms zijn geselecteerd op basis van de geselecteerde games
            $platforms = new \stdClass;
            $hasLaptopPS = false;
            $hasFysiek = false;

            $laptopPSGames = ['overcooked-2', 'split-fiction', 'escape-room-online', 'quiz'];
            $fysiekGames = ['skip-bo', 'uno', 'beverbende', 'truth-or-dare'];

            if (!empty($subOpties['games_keuzes'])) {
                foreach ($subOpties['games_keuzes'] as $game) {
                    if (in_array($game, $laptopPSGames)) {
                        $hasLaptopPS = true;
                    }
                    if (in_array($game, $fysiekGames)) {
                        $hasFysiek = true;
                    }
                }

                $item['games_keuzes'] = $subOpties['games_keuzes'];
                $item['games_platforms'] = [];
                if ($hasLaptopPS) {
                    $item['games_platforms'][] = 'laptop-ps';
                }
                if ($hasFysiek) {
                    $item['games_platforms'][] = 'fysiek';
                }
            }
        } elseif ($activiteit === 'karaoke' && !empty($subOpties['karaoke_keuze'])) {
            $item['karaoke_keuze'] = $subOpties['karaoke_keuze'];
        }

        return $item;
    }
}

