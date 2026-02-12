# 💕 Valentijnsdag Online Date Planning Systeem

## Overzicht
Dit is een complete Laravel applicatie voor het plannen van een perfecte Valentijnsdag online date. Het systeem bestaat uit meerdere pagina's met een complete flow van selectie tot gedetailleerde planning.

## 📋 Pagina Structuur

### 1. **Hoofdpagina (/)** - `resources/views/valentijn/index.blade.php`
De startpagina waar gebruikers:
- Minimaal 1 activiteit kunnen selecteren uit 3 opties
- Sub-opties kunnen kiezen per activiteit
- **Vaste starttijd: 14:00 uur**
- **Eten koken is vast onderdeel** (niet kiesbaar, altijd inbegrepen)

**Beschikbare Activiteiten:**
- 🎬 Samen Chosen Kijken (120 min)
  - Sub-opties: Chosen serie, Romantische film, Comedy film
- 🎮 Spelletjes Spelen (60 min)
  - Sub-opties: Skip-Bo, Uno, Beverbende, Truth or Dare Couples, Escape Room, Overcooked 2, Split Fiction
- 🎤 Karaoke & Quiz (45 min)
  - Sub-opties: Karaoke zingen, Quiz over elkaar, Beide

**Vast Onderdeel:**
- 🍽️ Zelfde Gerecht Koken (90 min) - Altijd inbegrepen in planning

### 2. **Planning Overzicht** - `resources/views/valentijn/planning.blade.php`
Na het indienen van het formulier krijg je:
- Een visuele tijdlijn van alle gekozen activiteiten (inclusief eten)
- Automatisch berekende start- en eindtijden (vanaf 14:00)
- Weergave van gekozen sub-opties per activiteit
- Statistieken (aantal activiteiten, totale duur, etc.)
- Links naar gedetailleerde pagina's per activiteit

### 3. **Activiteit Details** - `resources/views/valentijn/activiteit.blade.php`
Elke activiteit heeft een eigen detailpagina met:
- **Interactieve checklist** met voortgangsbalk
- Stap-voor-stap instructies
- Concrete tips en suggesties
- Platform aanbevelingen
- Specifieke game/film/quiz suggesties

## 🗂️ Bestandsstructuur

```
app/Http/Controllers/
└── ValentijnController.php         # Hoofd controller met alle logica

routes/
└── web.php                          # Route definities

resources/views/valentijn/
├── index.blade.php                  # Hoofdpagina (activiteit selectie)
├── planning.blade.php               # Planning tijdlijn overzicht
├── activiteit.blade.php             # Master template voor activiteit details
└── activiteiten/
    ├── film.blade.php               # Chosen/Film kijken details
    ├── eten.blade.php               # Samen koken details
    ├── games.blade.php              # Spelletjes details
    └── karaoke.blade.php            # Karaoke & Quiz details
```

## 🚀 Gebruik

### Starten van de applicatie:

1. **Start XAMPP** (Apache en MySQL)

2. **Navigeer naar project directory:**
   ```powershell
   cd C:\xampp\htdocs\bestanden\laravel-website\mijn-project
   ```

3. **Start Laravel development server:**
   ```powershell
   php artisan serve
   ```

4. **Open in browser:**
   ```
   http://localhost:8000
   ```

### Gebruikersflow:

1. **Zie dat eten vast staat** op de hoofdpagina
2. **Selecteer extra activiteiten** (minimaal 1 uit film, games, karaoke)
3. **Kies sub-opties** voor geselecteerde activiteiten
4. **Klik op "Maak Mijn Planning"**
5. **Bekijk de tijdlijn** vanaf 14:00 met alle activiteiten (inclusief eten)
6. **Zie welke sub-opties** je hebt gekozen per activiteit
7. **Klik op "Bekijk Details"** bij elke activiteit voor:
   - Complete checklist
   - Voorbereiding tips
   - Specifieke suggesties voor jouw keuzes

## ✨ Functies

### Automatische Tijdsberekening
- Start altijd om **14:00 uur**
- Eten wordt automatisch toegevoegd aan de planning
- Vloeiende overgang tussen activiteiten
- Rekening houdend met duur van elke activiteit

### Sub-Opties per Activiteit
**Film/Serie:**
- Chosen (serie)
- Romantische film
- Comedy film

**Spelletjes:**
- Skip-Bo (kaartspel)
- Uno (kaartspel)
- Beverbende (kaartspel)
- Truth or Dare - Couples Editie
- Online Escape Room
- Overcooked 2 (co-op game)
- Split Fiction (co-op game)

**Karaoke & Quiz:**
- Karaoke zingen
- Quiz over elkaar
- Beide combineren

### Interactieve Checklists
- Vink items af tijdens voorbereiding
- Realtime voortgangsbalk
- Items worden visueel gemarkeerd als "gedaan"
- Progress percentage wordt getoond

### Content per Activiteit

**Samen Chosen Kijken:**
- Netflix Party setup instructies
- Kijk suggesties (Chosen, romantische films, comedies, series)
- Snack ideeën
- Sfeer creatie tips

**Zelfde Gerecht Koken:**
- Menu suggesties (voorgerecht, hoofd, dessert)
- Kook instructies voor samen koken via video
- Beginner-vriendelijke recepten
- Tafeldecoratie en sfeer tips

**Spelletjes Spelen:**
- Kaartspellen: Skip-Bo, Uno, Beverbende instructies
- Videogames: Overcooked 2, Split Fiction details
- Truth or Dare Couples ideeën
- Online Escape Room aanbevelingen
- Quiz maken over elkaar

**Karaoke & Quiz:**
- Romantische duetten
- Solo hits
- Quiz vragen ideeën over elkaar
- Platform aanbevelingen
- Fun & gekke liedjes

## 🎨 Design Kenmerken

- **Kleurschema:** Paars/violet gradient (#667eea → #764ba2)
- **Typografie:** Segoe UI (modern en leesbaar)
- **Iconen:** Emoji's voor visuele appeal
- **Layout:** Card-based met shadow effects
- **Interactie:** Hover states, smooth transitions, collapsible sub-options

## 🛠️ Technische Details

### Controller Functies

**`index()`**
- Toont de hoofdpagina met activiteit selectie

**`planning(Request $request)`**
- Valideert formulier input (activiteiten + sub-opties)
- Voegt automatisch 'eten' toe aan planning
- Berekent tijdlijn vanaf 14:00
- Genereert planning overzicht met sub-keuzes

**`activiteit($type, Request $request)`**
- Laadt specifieke activiteit details
- Ondersteunt: film, eten, games, karaoke
- 404 error bij ongeldige activiteit type

**`berekenPlanning($activiteiten, $starttijd, $subOpties)`** (private)
- Berekent start- en eindtijden vanaf 14:00
- Voegt eten automatisch toe indien niet geselecteerd
- Maakt planning array met alle details en sub-keuzes

### Routes

```php
GET  /                          # Hoofdpagina
POST /planning                  # Planning genereren
GET  /activiteit/{type}         # Activiteit details
```

## 📝 Belangrijke Wijzigingen

### Vaste Onderdelen:
- ✅ Starttijd altijd **14:00 uur**
- ✅ **Eten koken** is vast onderdeel (automatisch toegevoegd)
- ❌ Museum en sterren kijken **verwijderd**

### Nieuwe Features:
- ✅ Sub-opties selectie per activiteit
- ✅ Specifieke spelletjes keuze (Skip-Bo, Uno, Beverbende, etc.)
- ✅ Chosen serie als optie
- ✅ Truth or Dare Couples editie
- ✅ Overcooked 2 & Split Fiction
- ✅ Quiz optie bij karaoke

## 💡 Tips voor Beste Ervaring

- Kies minimaal 2 activiteiten voor een volle date
- Test de applicatie door verschillende combinaties te proberen
- Gebruik Chrome/Edge voor beste compatibiliteit
- Print de checklists als fysieke reminder
- Plan pauzes tussen activiteiten in

## 🎯 Voorbeeld Planning

Als je om 14:00 begint en kiest voor: Film, Games, Karaoke

**Tijdlijn:**
- 14:00 - 15:30 (90 min) - 🍽️ Zelfde Gerecht Koken
- 15:30 - 17:30 (120 min) - 🎬 Samen Chosen Kijken
- 17:30 - 18:30 (60 min) - 🎮 Spelletjes (Skip-Bo, Uno)
- 18:30 - 19:15 (45 min) - 🎤 Karaoke & Quiz

**Eindtijd:** 19:15

---

**Veel plezier met jullie Valentijnsdag date! 💕**

### 2. **Planning Overzicht** - `resources/views/valentijn/planning.blade.php`
Na het indienen van het formulier krijg je:
- Een visuele tijdlijn van alle gekozen activiteiten
- Automatisch berekende start- en eindtijden
- Statistieken (aantal activiteiten, totale duur, etc.)
- Links naar gedetailleerde pagina's per activiteit

### 3. **Activiteit Details** - `resources/views/valentijn/activiteit.blade.php`
Elke activiteit heeft een eigen detailpagina met:
- **Interactieve checklist** met voortgangsbalk
- Stap-voor-stap instructies
- Concrete tips en suggesties
- Platform aanbevelingen
- Menu/muziek/spel suggesties (afhankelijk van activiteit)

## 🗂️ Bestandsstructuur

```
app/Http/Controllers/
└── ValentijnController.php         # Hoofd controller met alle logica

routes/
└── web.php                          # Route definities

resources/views/valentijn/
├── index.blade.php                  # Hoofdpagina (activiteit selectie)
├── planning.blade.php               # Planning tijdlijn overzicht
├── activiteit.blade.php             # Master template voor activiteit details
└── activiteiten/
    ├── film.blade.php               # Film avond details
    ├── diner.blade.php              # Diner details
    ├── games.blade.php              # Game night details
    ├── museum.blade.php             # Museum tour details
    ├── karaoke.blade.php            # Karaoke details
    └── sterren.blade.php            # Sterren kijken details
```

## 🚀 Gebruik

### Starten van de applicatie:

1. **Start XAMPP** (Apache en MySQL)

2. **Navigeer naar project directory:**
   ```powershell
   cd C:\xampp\htdocs\bestanden\laravel-website\mijn-project
   ```

3. **Start Laravel development server:**
   ```powershell
   php artisan serve
   ```

4. **Open in browser:**
   ```
   http://localhost:8000
   ```

### Gebruikersflow:

1. **Selecteer activiteiten** op de hoofdpagina
2. **Kies starttijd** (standaard 18:00)
3. **Klik op "Maak Mijn Planning"**
4. **Bekijk de tijdlijn** met alle activiteiten
5. **Klik op "Bekijk Details"** bij elke activiteit voor:
   - Complete checklist
   - Voorbereiding tips
   - Platform/menu/muziek suggesties
   - Gesprek starters en extra ideeën

## ✨ Functies

### Automatische Tijdsberekening
- Systeem berekent automatisch start- en eindtijden
- Rekening houdend met de duur van elke activiteit
- Vloeiende overgang tussen activiteiten

### Interactieve Checklists
- Vink items af tijdens voorbereiding
- Realtime voortgangsbalk
- Items worden visueel gemarkeerd als "gedaan"
- Progress percentage wordt getoond

### Responsive Design
- Werkt op desktop, tablet en mobiel
- Mooie gradient achtergronden
- Smooth animaties en hover effecten

### Content per Activiteit

**Film Avond:**
- Netflix Party setup
- Film suggesties per genre
- Snack ideeën
- Sfeer creatie tips

**Virtueel Diner:**
- Menu suggesties (voorgerecht, hoofd, dessert)
- Kook instructies
- Beginner-vriendelijke recepten
- Tafeldecoratie tips

**Game Night:**
- Online bordspellen (Board Game Arena)
- Co-op videogames
- Virtuele escape rooms
- Trivia quiz ideeën

**Museum Tour:**
- Top musea wereldwijd
- Google Arts & Culture guide
- Thematische tours
- Gesprek starters over kunst

**Karaoke:**
- Romantische duetten
- Solo hits
- Fun & gekke liedjes
- Platform aanbevelingen

**Sterren Kijken:**
- App suggesties (Stellarium)
- Sterrenbeelden en planeten spotting
- Romantische gesprek onderwerpen
- Ruimte weetjes

## 🎨 Design Kenmerken

- **Kleurschema:** Paars/violet gradient (#667eea → #764ba2)
- **Typografie:** Segoe UI (modern en leesbaar)
- **Iconen:** Emoji's voor visuele appeal
- **Layout:** Card-based met shadow effects
- **Interactie:** Hover states en smooth transitions

## 🛠️ Technische Details

### Controller Functies

**`index()`**
- Toont de hoofdpagina met activiteit selectie

**`planning(Request $request)`**
- Valideert formulier input
- Berekent tijdlijn
- Genereert planning overzicht

**`activiteit($type)`**
- Laadt specifieke activiteit details
- 404 error bij ongeldige activiteit type

**`berekenPlanning($activiteiten, $starttijd)`** (private)
- Berekent start- en eindtijden
- Maakt planning array met alle details

### Routes

```php
GET  /                          # Hoofdpagina
POST /planning                  # Planning genereren
GET  /activiteit/{type}         # Activiteit details
```

## 📝 Aanpassen en Uitbreiden

### Nieuwe Activiteit Toevoegen:

1. **Update `ValentijnController.php`:**
   - Voeg toe aan `$activiteiten` array in `activiteit()` method
   - Voeg duur toe in `berekenPlanning()`

2. **Maak nieuwe view:**
   - Creëer `resources/views/valentijn/activiteiten/nieuwe-activiteit.blade.php`

3. **Update `index.blade.php`:**
   - Voeg checkbox card toe

4. **Update `activiteit.blade.php`:**
   - Voeg `@elseif` conditie toe voor nieuwe activiteit

### Duur Aanpassen:
Wijzig de minuten in de `$duraties` array in `ValentijnController.php`

## 💡 Tips voor Beste Ervaring

- Test de applicatie door verschillende combinaties te proberen
- Gebruik Chrome/Edge voor beste compatibiliteit
- Bekijk op mobiel voor responsive experience
- Print de checklists als fysieke reminder

## 🎯 Toekomstige Verbeteringen (Optioneel)

- [ ] Opslaan van planning in database
- [ ] Email functie om planning te versturen
- [ ] PDF export van checklist
- [ ] Gebruikers accounts voor meerdere planningen
- [ ] Delen functie via social media
- [ ] Custom activiteit toevoegen optie
- [ ] Reminder notificaties

---

**Veel plezier met jullie Valentijnsdag date! 💕**

