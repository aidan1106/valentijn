# 🎯 QUICK START GUIDE - Valentijnsdag Date Planner 2.0

## ⚡ SNELLE START

### 1. Server Starten
```powershell
cd C:\xampp\htdocs\bestanden\laravel-website\mijn-project
php artisan serve
```

### 2. Open Browser
```
http://localhost:8000
```

**KLAAR!** 🎉

---

## 🗺️ PAGINA ROUTES

| Route | Pagina | Functie |
|-------|--------|---------|
| `/` | Hoofdpagina | Drag & drop + selectie |
| `/planning` | Planning Tijdlijn | Timeline weergave |
| `/activiteit/film` | Film Details | Checklist + tips |
| `/activiteit/eten` | Eten Details | Checklist + recepten |
| `/activiteit/games` | Games Details | Checklist + spelregels |
| `/activiteit/karaoke` | Karaoke Details | Checklist + liedjes |

---

## 🎮 DRAG & DROP INTERFACE

### Stap 1: Selecteer + Sleep
```
☰ 🎬 Film/Serie Kijken          ← SLEEP DIT
☰ 🎮 Spelletjes Spelen          ← OF DIT
☰ 🎤 Karaoke & Quiz             ← OF DIT
```

### Stap 2: Vul Sub-Opties In
```
🎬 Film:
   Kies Type → Kies Optie (1x)

🎮 Spellen:
   Kies Platform → Kies Max 4

🎤 Karaoke:
   Kies Optie (Karaoke/Quiz/Beide)
```

### Stap 3: Submit
```
[✨ Maak Mijn Planning ✨]
```

### Stap 4: Bekijk Planning
```
Timeline met alle keuzes + timing
```

---

## 🎬 FILM OPTIES

### Serie Keuzes
- **Chosen** - Must-watch reeks!
- **Romantische Serie** - Any romantische series

### Film Keuzes
- **Romantische Film** - Klassieke romantiek
- **Comedy Film** - Light-hearted fun

**Selectie:** Radio buttons (max 1!)

---

## 🎮 SPELLEN OPTIES

### Laptop/PlayStation Platform
1. **Overcooked 2** - Co-op cooking chaos
2. **Split Fiction** - Story-driven co-op
3. **Online Escape Room** - Puzzle solving
4. **Quiz** - Knowledge game

### Fysiek Platform
1. **Skip-Bo** - Card game
2. **Uno** - Color/number game
3. **Beverbende** - Strategy game
4. **Truth or Dare** - Question/dare game

**Selectie:** Checkboxes (Max 4!)
**Counter:** Live teller toont X/4

---

## 🎤 KARAOKE OPTIES

- **Karaoke Zingen** - Muziek afspelen
- **Quiz** - Vragen over elkaar
- **Beide** - Karaoke + Quiz combined

**Selectie:** Radio buttons (max 1!)

---

## ⏰ TIMING VOORBEELD

### Scenario 1: Film + Spellen
```
14:00 - 15:30  🍽️  Eten (90 min)
15:30 - 17:30  🎬  Film (120 min)
17:30 - 18:30  🎮  Spellen (60 min)
─────────────────────
Totaal: 4,5 uur (tot 18:30)
```

### Scenario 2: Alle Activiteiten
```
14:00 - 15:30  🍽️  Eten (90 min)
15:30 - 17:30  🎬  Film (120 min)
17:30 - 18:30  🎮  Spellen (60 min)
18:30 - 19:15  🎤  Karaoke (45 min)
─────────────────────
Totaal: 5,25 uur (tot 19:15)
```

### Scenario 3: Spellen Eerst
```
14:00 - 15:30  🍽️  Eten (90 min)
15:30 - 16:30  🎮  Spellen (60 min)
16:30 - 18:30  🎬  Film (120 min)
18:30 - 19:15  🎤  Karaoke (45 min)
─────────────────────
Totaal: 5,25 uur (tot 19:15)
```

**JIJ BEPAALT DE VOLGORDE!** ☰

---

## 📋 ACTIVITEIT DETAILS

### 🍽️ Zelfde Gerecht Koken
- **Duur:** 90 minuten
- **Timing:** Altijd van 14:00 - 15:30
- **Positie:** ALTIJD EERST
- **Status:** Verplicht (niet uit te zetten)
- **Details:** Menu suggesties, recepten, tips

### 🎬 Film/Serie Kijken
- **Duur:** 120 minuten
- **Timing:** Afhankelijk van volgorde
- **Selectie:** Serie of Film + Optie
- **Details:** Kijk tips, snack ideeën, streamen platformen

### 🎮 Spelletjes Spelen
- **Duur:** 60 minuten
- **Timing:** Afhankelijk van volgorde
- **Selectie:** Platform (Laptop/PS of Fysiek) + Max 4 spellen
- **Details:** Spelregels, platformgids, tips per spel

### 🎤 Karaoke & Quiz
- **Duur:** 45 minuten
- **Timing:** Afhankelijk van volgorde
- **Selectie:** Karaoke, Quiz, of Beide
- **Details:** Liedjes, quiz vragen, app suggesties

---

## ✅ FORM VALIDATIE

### Vereist
- ✅ Minimaal 1 activiteit (naast eten)
- ✅ Film/Karaoke: Max 1 keuze
- ✅ Spellen: Max 4 keuzes

### Auto-Features
- ✅ Eten staat altijd eerste
- ✅ Volgorde wordt behouden
- ✅ Sub-opties filteren dynamisch

---

## 🎯 TIPS & TRICKS

### Drag & Drop
- **Grab handle:** ☰ symbool
- **Smooth:** Vloeiende animaties
- **Feedback:** Item wordt grijs tijdens slepen

### Sub-Opties
- Verschijnen ALLEEN als activiteit checked is
- Verdwijnen automatisch bij unchecking
- Dynamische content op basis van selectie

### Counter
- Games counter toont: "X/4 gekozen"
- Auto-disable na 4 selecties
- Enable opnieuw als je onthecht

---

## 🔍 DEBUG INFO

### Browser Console (F12)
```javascript
// Check JavaScript errors
// Drag & drop events
// Form submissions
```

### Network Tab
```
GET  /                    200 OK
POST /planning            302 Redirect → /planning
GET  /planning            200 OK
GET  /activiteit/film     200 OK
```

---

## 📱 DEVICE SUPPORT

| Device | Support | Drag & Drop |
|--------|---------|-------------|
| Desktop | ✅ Full | ✅ Yes |
| Tablet | ✅ Full | ✅ Yes (touch) |
| Mobile | ✅ Full | ✅ Yes (touch) |

---

## 🆘 HELP & SUPPORT

### Issue: "Server start niet"
```
✓ Check: cd in juiste directory
✓ Check: `php artisan serve` in terminaal
✓ Try: `php artisan serve --host=0.0.0.0 --port=8000`
```

### Issue: "Drag & drop werkt niet"
```
✓ Check: Browser is Chrome, Edge, of Firefox
✓ Try: Page refresh (Ctrl+F5)
✓ Try: Clear cache (Ctrl+Shift+Delete)
```

### Issue: "Formulier submit werkt niet"
```
✓ Check: Minimaal 1 activiteit selected
✓ Check: Max 4 spellen gekozen
✓ Check: Browser console voor errors (F12)
```

---

## 🎁 BONUS

### Theming
Wijzig gradiënt in CSS (paars naar andere kleur):
```css
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Duur Aanpassen
In `ValentijnController.php`:
```php
$duraties = [
    'film' => 120,      // ← wijzig
    'eten' => 90,       // ← wijzig
    'games' => 60,      // ← wijzig
    'karaoke' => 45,    // ← wijzig
];
```

### Spellen Toevoegen
In `index.blade.php`, voeg toe aan array:
```javascript
const gamesDataFysiek = [
    { value: 'nieuw-spel', label: 'Nieuw Spel' },
    ...
];
```

---

## 📚 DOCUMENTATIE FILES

```
mijn-project/
├── UPDATE_2.0.md           📖 Tech details
├── HANDLEIDING_2.0.md      📖 Complete guide
├── WIJZIGINGEN.md          📖 Change log
├── VALENTIJN_README.md     📖 Origineel
└── SUMMARY_UPDATE_2.0.md   📖 Dit bestand
```

---

## 🚀 KLAAR?

```
1. php artisan serve
2. http://localhost:8000
3. Sleep, selecteer, plan!
4. Enjoy! 💕
```

**Veel plezier met jullie Valentijnsdag planning!** 🎉✨

