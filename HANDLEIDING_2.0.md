# 🎉 Valentijnsdag Date Planner - Volledige Update 2.0

## 🚀 Wat is Nieuw?

### 1. **DRAG & DROP VOLGORDE** 🎯
- Sleep de activiteiten om ze in de volgorde in te stellen die je wilt
- Eten staat ALTIJD eerst (14:00 - 15:30)
- Daarna kunnen Film, Spellen en Karaoke in willekeurige volgorde
- Smooth animaties en visual feedback

### 2. **FILM: Stap-voor-Stap Selectie** 🎬
Eerst kies je wat je wilt:
- **Serie:** Chosen, Romantische Serie
- **Film:** Romantische Film, Comedy Film

Dan kies je 1 specifieke optie (radio buttons - maar 1 keuze!)

### 3. **SPELLEN: Platform + Limiet** 🎮
Eerst kies je platform:
- **Laptop/PlayStation:** Overcooked 2, Split Fiction, Online Escape Room, Quiz
- **Fysiek:** Skip-Bo, Uno, Beverbende, Truth or Dare

Dan kies je MAX 4 spelletjes (checkboxes)
- Live counter toont: "X/4 gekozen"
- Automatisch disablen na 4 selecties

## 📋 Gedetailleerde Flow

### Stap 1: Hoofdpagina (http://localhost:8000)
```
Header: "Valentijnsdag Date Planning"
↓
Info Box: "Beginnen om 14:00, sleep voor volgorde"
↓
[🍽️ Vaste: Zelfde Gerecht Koken]
↓
[Drag activiteiten:]
  ☰ 🎬 Film/Serie Kijken (120 min)
     └─ Sub: Type (Serie/Film) + Keuze
  
  ☰ 🎮 Spelletjes Spelen (60 min)
     └─ Sub: Platform + Max 4 spellen
  
  ☰ 🎤 Karaoke & Quiz (45 min)
     └─ Sub: Karaoke/Quiz/Beide
↓
[✨ Maak Mijn Planning ✨]
```

### Stap 2: Film/Serie Selectie
1. Vink "Film/Serie Kijken" aan
2. Kies Type: "Serie" of "Film"
3. Sub-opties verschijnen:
   - Serie: Chosen / Romantische Serie
   - Film: Romantische Film / Comedy Film
4. Kies 1 (radio button)

### Stap 3: Spellen Selectie
1. Vink "Spelletjes Spelen" aan
2. Kies Platform: "Laptop/PS" of "Fysiek"
3. Sub-opties verschijnen:
   - **Laptop/PS:** Overcooked 2, Split Fiction, Escape Room, Quiz
   - **Fysiek:** Skip-Bo, Uno, Beverbende, Truth or Dare
4. Kies MAX 4 (checkboxes - teller toont X/4)

### Stap 4: Planning Bekijken
Zie je complete tijdlijn:
- Gesleepte volgorde
- Alle sub-keuzes zichtbaar
- Automatisch berekende tijden
- Links naar detail pagina's

## 💻 Technische Wijzigingen

### ValentijnController.php
```php
// Input parameters:
$volgorde = ['film', 'games', 'karaoke'] // Gesleepte volgorde
$film_type = 'serie' | 'film' // Type keuze
$film_keuze = 'chosen' | 'romantic-series' | ... // Speficieke keuze
$games_platform = 'laptop-ps' | 'fysiek' // Platform keuze
$games_keuzes = ['skip-bo', 'uno', ...] // Max 4 spellen

// Output planning:
[
  'type' => 'eten',
  'titel' => 'Zelfde Gerecht Koken',
  'starttijd' => '14:00',
  'eindtijd' => '15:30',
  ...
]
```

### index.blade.php
```html
<!-- Drag & Drop List -->
<ul class="activity-list" id="activityList">
  <li draggable="true" data-type="film">
    ☰ 🎬 Film/Serie
    ├─ Checkbox
    ├─ Film Type Opties (hidden tot checked)
    └─ Film Choice Opties (hidden tot type selected)
  </li>
  ...
</ul>

<!-- JavaScript: -->
- Drag & drop event handlers
- Sub-options show/hide logic
- Game counter limit (max 4)
- Form validation
```

### planning.blade.php
```php
// Toon nu:
@if(isset($item['film_type']) && isset($item['film_keuze']))
  <strong>Film/Serie:</strong> [Type] - [Keuze]
@endif

@if(isset($item['games_platform']))
  <strong>Platform:</strong> [Laptop/PS | Fysiek]
  <strong>Spellen:</strong> [List van 1-4 spellen]
@endif
```

## 🎮 Spelletjes Onderscheid

### 💻 Digitaal (Laptop/PlayStation)
Allemaal videogames/online spellen:
- **Overcooked 2** - Co-op chaos cooking game
- **Split Fiction** - Adventure/story co-op game
- **Online Escape Room** - Puzzle solving online
- **Quiz** - Knowledge game online

### 🃏 Fysiek (Kaarten/Bordspellen)
Allemaal offline spellen met fysieke kaarten:
- **Skip-Bo** - Kaartspel (elk eigen deck)
- **Uno** - Kaartspel (elk eigen deck)
- **Beverbende** - Kaartspel (elk eigen deck)
- **Truth or Dare** - Vragen/uitdagingen game

## 📊 Voorbeeld Planning

**Input:**
- Volgorde: [film, games, karaoke] (gesleept)
- Film Type: "Serie"
- Film Keuze: "chosen"
- Games Platform: "fysiek"
- Games Keuzes: ["skip-bo", "uno", "truth-or-dare"]
- Karaoke: "beide"

**Output Timeline:**
```
14:00 - 15:30  🍽️  Zelfde Gerecht Koken
15:30 - 17:30  🎬  Film/Serie (Serie: Chosen)
17:30 - 18:30  🎮  Spelletjes (Fysiek: Skip-Bo, Uno, Truth or Dare)
18:30 - 19:15  🎤  Karaoke & Quiz (Beide)

Eindtijd: 19:15
```

## 🎯 Validatie & Limieten

- ✅ Minimaal 1 activiteit (naast eten)
- ✅ Film: Altijd max 1 keuze
- ✅ Spellen: Altijd max 4 keuzes
- ✅ Eten: Altijd eerst
- ✅ Max 1 film/serie per planning

## 📱 Responsive Design

- ✅ Desktop: Full drag & drop support
- ✅ Tablet: Drag & drop via touch events
- ✅ Mobile: Optimized layout, gestures support

## 🐛 Troubleshooting

**Drag & drop werkt niet:**
- Check browser (Chrome/Edge/Firefox)
- Refresh pagina
- Clear browser cache

**Spellen counter toont niet:**
- JavaScript moet enabled zijn
- Check console voor errors (F12)

**Sub-opties verdwijnen:**
- Checkbox unchecked? Vink opnieuw aan
- Form refresh? Keuzes zouden behouden moeten blijven

## 🔧 Onderhouds Info

### Routes
```php
GET  /                    # Hoofdpagina (index.blade.php)
POST /planning            # Planning genereren
GET  /activiteit/{type}   # Detail pagina
```

### View Files
```
resources/views/valentijn/
├── index.blade.php          # Drag & drop interface
├── planning.blade.php       # Timeline weergave
├── activiteit.blade.php     # Detail template
└── activiteiten/
    ├── film.blade.php       # Film details
    ├── eten.blade.php       # Eten details
    ├── games.blade.php      # Games details (UPDATED)
    └── karaoke.blade.php    # Karaoke details
```

## 🚀 Start Applicatie

```powershell
cd C:\xampp\htdocs\bestanden\laravel-website\mijn-project
php artisan serve
```

Dan: http://localhost:8000

## 📝 Changelog Update 2.0

### Added (Nieuw)
- ✨ Drag & drop volgorde selekties
- ✨ Film type + keuze staps (Serie vs Film)
- ✨ Games platform selectie (Laptop/PS vs Fysiek)
- ✨ Max 4 spellen limiet met live counter
- ✨ Dynamische sub-opties generatie

### Changed (Gewijzigd)
- 🔄 Controller: 'activiteiten' → 'volgorde'
- 🔄 Film: Renamed "Chosen" → "Film/Serie Kijken"
- 🔄 Games: Categorized per platform
- 🔄 Planning: Toont nu platform + type info

### Kept (Behouden)
- ✅ Vaste 14:00 starttijd
- ✅ Eten altijd vast en eerst
- ✅ Interactieve checklists
- ✅ Mooie design & animations

---

**Veel plezier met de verbeterde date planner! 💕🎉**

