# 🎉 Valentijnsdag Date Planning - Update 2.0

## ✨ Grote Nieuwe Features

### 1. **Drag & Drop Volgorde (⭐ NIEUW!)**
- ✅ **Sleep activiteiten om ze in gewenste volgorde in te stellen**
- ✅ Eten staat altijd eerst (14:00 - 15:30)
- ✅ Andere activiteiten kunnen in willekeurige volgorde
- ✅ Smooth drag & drop animaties
- ✅ Visual feedback (grepen en gesleepte items geven feedback)

### 2. **Film/Serie Keuze - Stap voor Stap (⭐ NIEUW!)**
- ✅ **Stap 1:** Kies je platform (Serie of Film)
  - Serie options: Chosen, Romantische Serie
  - Film options: Romantische Film, Comedy Film
- ✅ **Stap 2:** Kies je specifieke serie/film
- ✅ Max 1 keuze (radio buttons)
- ✅ Automatisch filteren van opties op basis van keuze

### 3. **Spellen - Platform Selectie (⭐ NIEUW!)**
- ✅ **Stap 1:** Kies je platform
  - **Laptop/PlayStation:** Overcooked 2, Split Fiction, Online Escape Room, Quiz
  - **Fysiek:** Skip-Bo, Uno, Beverbende, Truth or Dare
- ✅ **Stap 2:** Kies max. 4 spelletjes (checkboxes)
- ✅ Unchecked items worden automatisch disabled als 4 gekozen zijn
- ✅ Live counter: "X/4 gekozen"
- ✅ Platform-specifieke details in planning

## 📋 Update Highlights

### Controller (`ValentijnController.php`)
```php
// Wijzigingen:
- Volgorde parameter: $request->input('volgorde')
- Film type keuze: film_type (serie/film)
- Film keuze: film_keuze (dynamisch op type)
- Games platform: games_platform (laptop-ps / fysiek)
- Games max 4: games_keuzes (array met max 4)
- Eten altijd eerst in planning
```

### Hoofdpagina (`index.blade.php`)
```
Nieuwe structuur:
├── Vaste Eten sectie
└── Drag & Drop Activiteiten List
    ├── 🎬 Film/Serie (met sub-stappen)
    │   ├── Stap 1: Type (Serie/Film)
    │   └── Stap 2: Keuze (dynamisch)
    ├── 🎮 Spellen (met sub-stappen)
    │   ├── Stap 1: Platform
    │   └── Stap 2: Max 4 spelletjes
    └── 🎤 Karaoke (ongewijzigd)
```

### Planning Pagina (`planning.blade.php`)
```
Toont nu:
- Gesleepte volgorde
- Film type + keuze
- Games platform + geselecteerde spellen
- Karaoke keuze
- Complete timing voor alle activiteiten
```

### Games Detail Page (`games.blade.php`)
```
Toont nu:
- Platform info box
- Laptop/PS spellen met beschrijvingen
- Fysieke spellen met beschrijvingen
- Tips per platform
- Checklist voor voorbereiding
```

## 🎮 Spelletjes Categorisatie

### 💻 Laptop/PlayStation (Digitaal)
- **Overcooked 2** - Co-op kookchaos
- **Split Fiction** - Verhaal-driven co-op
- **Online Escape Room** - Puzzels samen
- **Quiz** - Kennis testen

### 🃏 Fysiek (Kaarten/Bordspellen)
- **Skip-Bo** - Klassiek kaartspel
- **Uno** - Kleur/getal matching
- **Beverbende** - Strategie kaartspel
- **Truth or Dare** - Vragen/uitdagingen

## 🔧 Technische Details

### JavaScript Functionaliteit
```javascript
// Drag & Drop
- dragstart/dragend event listeners
- Dynamisch herordenen van items
- Visual feedback bij slepen

// Sub-opties
- Radio buttons voor enkelvoudige keuze (film, karaoke)
- Checkboxes voor meervoudige keuze (games max 4)
- Dynamische content generatie op basis van keuze
- Auto-disable van checkboxes na 4 selecties

// Validatie
- Minimaal 1 activiteit required
- Max 4 spelletjes check
```

### Volgorde Behoud
```php
// Old: activiteiten array
// New: volgorde array (gesleept in UI)

// Eten staat ALTIJD eerst:
$orderWithEten = array_merge(['eten'], 
    array_filter($volgorde, fn($a) => $a !== 'eten')
);
```

## 📊 Planning Voorbeeld

**Scenario:** Film + Games (Fysiek: Uno, Skip-Bo) + Karaoke

**Tijdlijn:**
```
14:00 - 15:30 (90 min)  🍽️  Zelfde Gerecht Koken
15:30 - 17:30 (120 min) 🎬  Film/Serie Kijken (Chosen)
17:30 - 18:30 (60 min)  🎮  Spelletjes (Fysiek: Uno, Skip-Bo)
18:30 - 19:15 (45 min)  🎤  Karaoke & Quiz
```

## 🎯 User Flow

1. **Drag activiteiten** in gewenste volgorde
2. **Selecteer Film:**
   - Kies type: Serie of Film
   - Kies specifieke optie
3. **Selecteer Spellen:**
   - Kies platform: Laptop/PS of Fysiek
   - Kies max 4 spelletjes
4. **Selecteer Karaoke** (optioneel)
5. **Submit planning**
6. **Zie complete timeline** met alle keuzes
7. **Bekijk details** per activiteit

## ✅ Checklist Updates

- ✅ Drag & drop volgorde
- ✅ Film type + keuze staps
- ✅ Game platform selectie
- ✅ Max 4 spellen limiet
- ✅ Dynamic form updates
- ✅ Planning display updates
- ✅ Games page platform info
- ✅ Voortgangsbalk voor spellen

## 🐛 QA Checklist

- [x] Drag & drop werkt smooth
- [x] Film opties filteren correct
- [x] Game platform switching werkt
- [x] Max 4 spellen enforcement
- [x] Planning berekening correct
- [x] Eten altijd eerst
- [x] Sub-opties tonen in planning
- [x] Form validatie werkt
- [x] Mobile responsive

## 📱 Browser Compatibility

- ✅ Chrome/Edge (drag & drop native support)
- ✅ Firefox (drag & drop werkt)
- ✅ Safari (drag & drop support)
- ✅ Mobile (drag & drop via touch events)

---

**Veel plezier met de geupdate date planner! 💕✨**

