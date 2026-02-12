<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw Valentijnsdag Planning 💕</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: white;
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 50px;
            width: 100%;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: calc(50% + 40px);
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-right: calc(50% + 40px);
        }

        .timeline-marker {
            position: absolute;
            left: 50%;
            top: 30px;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 10;
        }

        .timeline-content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
        }

        .timeline-content h2 {
            color: #ff6b9d;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .time-badge {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .duration {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .activity-link {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 30px;
            background: #ff6b9d;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: opacity 0.3s ease;
        }

        .activity-link:hover {
            opacity: 0.8;
        }

        .summary-box {
            background: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .summary-box h2 {
            color: #ff6b9d;
            margin-bottom: 15px;
        }

        .summary-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 2em;
            color: #ff6b9d;
            font-weight: bold;
        }

        .stat-label {
            color: #666;
            margin-top: 5px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 30px;
            }

            .timeline-marker {
                left: 30px;
            }

            .timeline-item:nth-child(odd) .timeline-content,
            .timeline-item:nth-child(even) .timeline-content {
                margin-left: 80px;
                margin-right: 0;
            }

            .header h1 {
                font-size: 2em;
            }

            .summary-stats {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💕 Jullie Valentijnsdag Planning 💕</h1>
            <p>Eten staat vast op 18:00 - 19:30 ✨</p>
        </div>

        <div class="summary-box">
            <h2>Jouw Date Overzicht</h2>
            <div class="summary-stats">
                <div class="stat">
                    <div class="stat-value">{{ count($planning) }}</div>
                    <div class="stat-label">Activiteiten</div>
                </div>
                <div class="stat">
                    <div class="stat-value">14:00</div>
                    <div class="stat-label">Start</div>
                </div>
                <div class="stat">
                    <div class="stat-value">18:00</div>
                    <div class="stat-label">Eten 🍽️</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ end($planning)['eindtijd'] ?? '20:00' }}</div>
                    <div class="stat-label">Einde</div>
                </div>
            </div>
            <a href="{{ route('valentijn.index') }}" class="back-btn">← Nieuwe Planning Maken</a>
        </div>

        <div class="timeline">
            @foreach($planning as $item)
            <div class="timeline-item">
                <div class="timeline-marker">{{ $item['icon'] }}</div>
                <div class="timeline-content">
                    <h2>{{ $item['titel'] }}</h2>
                    <div class="time-badge">
                        {{ $item['starttijd'] }} - {{ $item['eindtijd'] }}
                    </div>
                    <div class="duration">⏱️ Duur: {{ $item['duur'] }} minuten</div>

                    @if(isset($item['film_type']) && isset($item['film_keuze']))
                        <div style="margin-top: 10px; color: #666;">
                            <strong>Keuze:</strong>
                            @if($item['film_type'] == 'serie')
                                Serie:
                                @if($item['film_keuze'] == 'chosen') The Chosen
                                @elseif($item['film_keuze'] == 'gilmore-girls') Gilmore Girls
                                @endif
                            @elseif($item['film_type'] == 'film')
                                Film:
                                @if($item['film_keuze'] == 'romantic-film') Romantische Film
                                @elseif($item['film_keuze'] == 'comedy-film') Comedy Film
                                @endif
                            @endif
                        </div>
                    @endif

                    @if(isset($item['games_keuzes']) && count($item['games_keuzes']) > 0)
                        <div style="margin-top: 10px; color: #666;">
                            <strong>Platformen & Spellen:</strong><br>
                            @if(isset($item['games_platforms']) && count($item['games_platforms']) > 0)
                                @foreach($item['games_platforms'] as $platform)
                                    @if($platform == 'laptop-ps') 💻 Laptop/PlayStation
                                    @elseif($platform == 'fysiek') 🃏 Fysiek
                                    @endif
                                    <br>
                                @endforeach
                            @endif
                            <strong>Spelletjes:</strong><br>
                            @foreach($item['games_keuzes'] as $game)
                                @if($game == 'skip-bo') • Skip-Bo<br>
                                @elseif($game == 'uno') • Uno<br>
                                @elseif($game == 'beverbende') • Beverbende<br>
                                @elseif($game == 'truth-or-dare') • Truth or Dare<br>
                                @elseif($game == 'escape-room-online') • Online Escape Room<br>
                                @elseif($game == 'overcooked-2') • Overcooked 2<br>
                                @elseif($game == 'split-fiction') • Split Fiction<br>
                                @elseif($game == 'quiz') • Quiz<br>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if(isset($item['karaoke_keuze']))
                        <div style="margin-top: 10px; color: #666;">
                            <strong>Activiteit:</strong>
                            @if($item['karaoke_keuze'] == 'karaoke') Karaoke zingen
                            @elseif($item['karaoke_keuze'] == 'quiz') Quiz over elkaar
                            @elseif($item['karaoke_keuze'] == 'beide') Karaoke & Quiz
                            @endif
                        </div>
                    @endif

                    <a href="{{ route('valentijn.activiteit', $item['type']) }}" class="activity-link">
                        📋 Bekijk Details & Checklist
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('valentijn.index') }}" class="back-btn" style="display: inline-block;">
                🔄 Andere Planning Maken
            </a>
        </div>
    </div>
</body>
</html>

