<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jouw Valentijnsdag Planning Maker 💕</title>
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
            font-size: 1.1em;
            opacity: 0.9;
        }

        .form-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            margin-bottom: 30px;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .form-section h2 {
            color: #ff6b9d;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 3px solid #ff6b9d;
            padding-bottom: 10px;
        }

        .activity-group {
            background: #fff5f8;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #ff6b9d;
        }

        .activity-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            gap: 15px;
        }

        .activity-icon {
            font-size: 2em;
        }

        .activity-title {
            flex: 1;
            font-size: 1.3em;
            color: #333;
            font-weight: 600;
        }

        .checkbox {
            width: 24px;
            height: 24px;
            cursor: pointer;
            accent-color: #ff6b9d;
        }

        .duration-input-group {
            margin-top: 10px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            display: none;
        }

        .duration-input-group.visible {
            display: block;
        }

        .duration-input-group label {
            display: block;
            color: #333;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .duration-input-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ff6b9d;
            border-radius: 8px;
            font-size: 1em;
        }

        .duration-input-group input:focus {
            outline: none;
            border-color: #c44569;
        }

        .sub-options {
            margin-top: 15px;
            padding: 15px;
            background: white;
            border-radius: 10px;
            display: none;
        }

        .sub-options.visible {
            display: block;
        }

        .sub-option-group {
            margin-bottom: 15px;
        }

        .sub-option-group label {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            color: #333;
            margin-bottom: 8px;
        }

        .sub-option-group input[type="checkbox"],
        .sub-option-group input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #ff6b9d;
        }

        .platform-toggle {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .platform-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid #ff6b9d;
            background: white;
            color: #ff6b9d;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .platform-btn.active {
            background: #ff6b9d;
            color: white;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }

        .game-checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            cursor: pointer;
        }

        .game-checkbox-item input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #ff6b9d;
        }

        .submit-btn {
            display: inline-block;
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 25px;
            }

            .header h1 {
                font-size: 2em;
            }

            .games-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💕 Maak je Valentijnsdag Planning 💕</h1>
            <p>Selecteer activiteiten en stel je eigen duur in!</p>
        </div>

        <form method="POST" action="{{ route('valentijn.planning') }}" class="form-card">
            @csrf

            <div class="form-section">
                <h2>📅 Kies je Activiteiten</h2>
                <p style="color: #666; margin-bottom: 20px;">18:00 - 20:00 is VAST gereserveerd voor Eten 🍽️</p>

                <!-- Film -->
                <div class="activity-group">
                    <div class="activity-header">
                        <span class="activity-icon">🎬</span>
                        <span class="activity-title">Film/Serie Kijken</span>
                        <input type="checkbox" class="checkbox activity-checkbox" name="volgorde[]" value="film" data-activity="film">
                    </div>
                    <div class="duration-input-group" id="duration-film">
                        <label>Hoeveel minuten wil je reserveren?</label>
                        <input type="number" name="duur_film" value="90" min="15" step="5">
                    </div>
                    <div class="sub-options" id="options-film">
                        <div class="sub-option-group">
                            <label><input type="radio" name="film_type" value="film" checked> Film</label>
                            <label><input type="radio" name="film_type" value="serie"> Serie</label>
                        </div>
                        <div id="film-choices" style="margin-top: 10px;"></div>
                    </div>
                </div>

                <!-- Games -->
                <div class="activity-group">
                    <div class="activity-header">
                        <span class="activity-icon">🎮</span>
                        <span class="activity-title">Spelletjes Spelen</span>
                        <input type="checkbox" class="checkbox activity-checkbox" name="volgorde[]" value="games" data-activity="games">
                    </div>
                    <div class="duration-input-group" id="duration-games">
                        <label>Hoeveel minuten wil je reserveren?</label>
                        <input type="number" name="duur_games" value="60" min="15" step="5">
                    </div>
                    <div class="sub-options" id="options-games">
                        <div class="sub-option-group">
                            <h4 style="color: #ff6b9d; margin-bottom: 10px;">Kies Platform(s):</h4>
                            <div class="platform-toggle">
                                <button type="button" class="platform-btn active" data-platform="laptop-ps">💻 Laptop/PlayStation</button>
                                <button type="button" class="platform-btn" data-platform="fysiek">🃏 Fysiek</button>
                            </div>
                        </div>

                        <div class="sub-option-group">
                            <h4 style="color: #ff6b9d; margin-bottom: 10px;">Beschikbare Spellen (Max 6):</h4>
                            <div id="games-container"></div>
                        </div>
                    </div>
                </div>

                <!-- Karaoke -->
                <div class="activity-group">
                    <div class="activity-header">
                        <span class="activity-icon">🎤</span>
                        <span class="activity-title">Karaoke & Quiz</span>
                        <input type="checkbox" class="checkbox activity-checkbox" name="volgorde[]" value="karaoke" data-activity="karaoke">
                    </div>
                    <div class="duration-input-group" id="duration-karaoke">
                        <label>Hoeveel minuten wil je reserveren?</label>
                        <input type="number" name="duur_karaoke" value="45" min="15" step="5">
                    </div>
                    <div class="sub-options" id="options-karaoke">
                        <div class="sub-option-group">
                            <label><input type="radio" name="karaoke_keuze" value="karaoke" checked> Karaoke Zingen</label>
                            <label><input type="radio" name="karaoke_keuze" value="quiz"> Quiz over Elkaar</label>
                            <label><input type="radio" name="karaoke_keuze" value="beide"> Beide!</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">✨ Maak mijn Planning! ✨</button>
        </form>
    </div>

    <script>
        const games = {
            'laptop-ps': [
                { id: 'overcooked-2', name: 'Overcooked 2' },
                { id: 'split-fiction', name: 'Split Fiction' },
                { id: 'escape-room-online', name: 'Online Escape Room' },
                { id: 'quiz', name: 'Quiz' }
            ],
            'fysiek': [
                { id: 'skip-bo', name: 'Skip-Bo' },
                { id: 'uno', name: 'Uno' },
                { id: 'beverbende', name: 'Beverbende' },
                { id: 'truth-or-dare', name: 'Truth or Dare' }
            ]
        };

        const filmChoices = {
            'film': [
                { id: 'romantic-film', name: 'Romantische Film' },
                { id: 'comedy-film', name: 'Comedy Film' }
            ],
            'serie': [
                { id: 'chosen', name: 'The Chosen' },
                { id: 'gilmore-girls', name: 'Gilmore Girls' }
            ]
        };

        let currentPlatforms = new Set(['laptop-ps', 'fysiek']);
        let selectedGames = new Set();

        // Activity checkbox listeners
        document.querySelectorAll('.activity-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const activity = this.dataset.activity;
                const durationGroup = document.getElementById(`duration-${activity}`);
                const optionsGroup = document.getElementById(`options-${activity}`);

                if (this.checked) {
                    durationGroup.classList.add('visible');
                    optionsGroup.classList.add('visible');
                } else {
                    durationGroup.classList.remove('visible');
                    optionsGroup.classList.remove('visible');
                    selectedGames.clear();
                    updateGamesDisplay();
                }
            });
        });

        // Film type radio buttons
        document.querySelectorAll('input[name="film_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const choices = filmChoices[this.value] || [];
                const choicesDiv = document.getElementById('film-choices');
                choicesDiv.innerHTML = '';

                choices.forEach(choice => {
                    const label = document.createElement('label');
                    label.style.display = 'flex';
                    label.style.alignItems = 'center';
                    label.style.gap = '8px';
                    label.style.marginBottom = '8px';
                    label.style.cursor = 'pointer';
                    label.innerHTML = `
                        <input type="radio" name="film_keuze" value="${choice.id}" ${choice.id === 'chosen' || choice.id === 'romantic-film' ? 'checked' : ''}>
                        ${choice.name}
                    `;
                    choicesDiv.appendChild(label);
                });
            });
        });

        // Trigger initial film choices display
        document.querySelector('input[name="film_type"]:checked').dispatchEvent(new Event('change'));

        // Platform toggle buttons
        document.querySelectorAll('.platform-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const platform = this.dataset.platform;

                if (this.classList.contains('active')) {
                    currentPlatforms.delete(platform);
                    this.classList.remove('active');
                } else {
                    currentPlatforms.add(platform);
                    this.classList.add('active');
                }

                selectedGames.clear();
                updateGamesDisplay();
            });
        });

        function updateGamesDisplay() {
            const container = document.getElementById('games-container');
            container.innerHTML = '';

            let gamesList = [];
            currentPlatforms.forEach(platform => {
                gamesList = gamesList.concat(games[platform]);
            });

            gamesList.forEach(game => {
                const label = document.createElement('label');
                label.className = 'game-checkbox-item';
                label.innerHTML = `
                    <input type="checkbox" name="games_keuzes[]" value="${game.id}" data-game-id="${game.id}" class="game-checkbox">
                    <span>${game.name}</span>
                `;

                label.querySelector('input').addEventListener('change', function() {
                    if (this.checked) {
                        if (selectedGames.size < 6) {
                            selectedGames.add(game.id);
                        } else {
                            this.checked = false;
                            alert('Je kan maximum 6 spellen kiezen!');
                        }
                    } else {
                        selectedGames.delete(game.id);
                    }
                });

                container.appendChild(label);
            });
        }

        // Initial games display
        updateGamesDisplay();

        // Karaoke radio buttons
        document.querySelectorAll('input[name="karaoke_keuze"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Just store the value
            });
        });
    </script>
</body>
</html>

