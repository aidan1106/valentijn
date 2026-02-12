<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activiteit['titel'] }} 💕</title>
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
            max-width: 900px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-block;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 1.1em;
            padding: 10px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 25px;
            transition: background 0.3s ease;
        }

        .back-link:hover {
            background: rgba(255,255,255,0.3);
        }

        .header {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .header-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }

        .header h1 {
            color: #ff6b9d;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .duration-badge {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            padding: 10px 25px;
            border-radius: 20px;
            font-weight: 600;
            margin-top: 10px;
        }

        .content-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .content-card h2 {
            color: #ff6b9d;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 3px solid #ff6b9d;
            padding-bottom: 10px;
        }

        .checklist {
            list-style: none;
            margin-top: 20px;
        }

        .checklist li {
            padding: 15px 20px;
            margin-bottom: 15px;
            background: #fff5f8;
            border-radius: 10px;
            border-left: 5px solid #ff6b9d;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .checklist li:hover {
            background: #ffe0ed;
            transform: translateX(5px);
        }

        .checklist li input[type="checkbox"] {
            width: 24px;
            height: 24px;
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
            accent-color: #ff6b9d;
        }

        .checklist li.checked {
            opacity: 0.6;
            text-decoration: line-through;
            background: #d4edda;
        }

        .emoji-icon {
            font-size: 1.5em;
            flex-shrink: 0;
        }

        .item-content {
            flex: 1;
        }

        .item-content strong {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        .item-content span {
            color: #666;
            font-size: 0.95em;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .tip-card {
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
        }

        .tip-card .icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .tip-card h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .tip-card p {
            font-size: 0.95em;
            opacity: 0.9;
        }

        .progress-bar {
            background: #e9ecef;
            height: 30px;
            border-radius: 15px;
            overflow: hidden;
            margin: 20px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #ff6b9d 0%, #c44569 100%);
            width: 0%;
            transition: width 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .content-card {
                padding: 25px;
            }

            .tips-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="javascript:history.back()" class="back-link">← Terug naar Planning</a>

        <div class="header">
            <div class="header-icon">{{ $activiteit['icon'] }}</div>
            <h1>{{ $activiteit['titel'] }}</h1>
            <div class="duration-badge">⏱️ Geschatte duur: {{ $activiteit['duur'] }} minuten</div>
        </div>

        @if($type === 'film')
            @include('valentijn.activiteiten.film')
        @elseif($type === 'eten')
            @include('valentijn.activiteiten.eten')
        @elseif($type === 'games')
            @include('valentijn.activiteiten.games')
        @elseif($type === 'karaoke')
            @include('valentijn.activiteiten.karaoke')
        @endif

        <div style="text-align: center; margin-top: 30px;">
            <a href="javascript:history.back()" class="back-link">← Terug naar Planning</a>
        </div>
    </div>

    <script>
        // Checklist functionaliteit
        const checkboxes = document.querySelectorAll('.checklist input[type="checkbox"]');
        const progressFill = document.querySelector('.progress-fill');

        function updateProgress() {
            const total = checkboxes.length;
            const checked = document.querySelectorAll('.checklist input[type="checkbox"]:checked').length;
            const percentage = total > 0 ? (checked / total) * 100 : 0;

            if (progressFill) {
                progressFill.style.width = percentage + '%';
                progressFill.textContent = Math.round(percentage) + '%';
            }
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const li = this.closest('li');
                if (this.checked) {
                    li.classList.add('checked');
                } else {
                    li.classList.remove('checked');
                }
                updateProgress();
            });

            // Klik op hele item werkt ook
            const li = checkbox.closest('li');
            li.addEventListener('click', function(e) {
                if (e.target !== checkbox) {
                    checkbox.checked = !checkbox.checked;
                    checkbox.dispatchEvent(new Event('change'));
                }
            });
        });

        updateProgress();
    </script>
</body>
</html>

