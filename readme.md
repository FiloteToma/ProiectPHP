# Documentație pentru Aplicația PHP: Magazin de Periferice

## Descrierea Tematicii

Aplicația reprezintă un magazin online de periferice pentru calculatoare, oferind utilizatorilor posibilitatea de a explora o gamă variată de produse, de a consulta detalii despre acestea și de a lăsa recenzii. Aplicația include funcționalități de gestionare a utilizatorilor, comenzilor, recenziilor și stocurilor.

## Funcționalități

### 1. Gestionarea produselor

- **Afișarea produselor**: Utilizatorii pot vizualiza toate produsele disponibile, cu detalii despre nume, descriere, preț, imagine și categoria din care fac parte.
- **Detalii produs**: Fiecare produs are o pagină dedicată unde sunt afișate informații suplimentare și o imagine de dimensiuni mai mari.
- **Categorii**: Produsele sunt organizate pe categorii, iar utilizatorii pot filtra și vizualiza produse dintr-o anumită categorie.

### 2. Gestionarea utilizatorilor

- **Autentificare și înregistrare**: Utilizatorii își pot crea conturi și se pot autentifica pentru a plasa comenzi și a lăsa recenzii.
- **Profil utilizator**: Utilizatorii își pot actualiza informațiile de profil.

### 3. Gestionarea comenzilor

- **Plasarea comenzilor**: Utilizatorii pot adăuga produse în coș și pot plasa comenzi cu detalii despre cantitate și preț unitar.
- **Vizualizarea comenzilor**: Utilizatorii pot vedea istoricul comenzilor, iar administratorii pot gestiona și actualiza statusul comenzilor.

### 4. Recenzii

- **Adăugarea de recenzii**: Utilizatorii pot lăsa recenzii și evaluări pentru produsele achiziționate.
- **Vizualizarea recenziilor**: Fiecare produs are o secțiune de recenzii unde utilizatorii pot vedea opiniile altor cumpărători.

### 5. Gestionarea stocurilor

- **Actualizarea stocurilor**: Administratorii pot adăuga sau modifica cantitățile din stoc pentru fiecare produs.
- **Verificarea disponibilității**: Aplicația afișează starea stocului pentru utilizatori, indicând dacă un produs este disponibil sau nu.

## Structura Bazei de Date

### Tabele principale:

1. **utilizatori**: pentru gestionarea conturilor utilizatorilor.
2. **categorii**: pentru organizarea produselor.
3. **produse**: conține informații despre fiecare produs.
4. **comenzi**: pentru stocarea detaliilor comenzilor utilizatorilor.
5. **detalii_comanda**: legătura dintre comenzi și produse, indicând ce produse sunt incluse într-o comandă.
6. **recenzii**: pentru gestionarea recenziilor produselor.
7. **stocuri**: pentru urmărirea cantităților disponibile ale produselor.

## Fluxul de utilizare al aplicației

1. **Vizitarea site-ului**: Utilizatorii accesează aplicația și pot vizualiza toate produsele disponibile.
2. **Autentificare**: Utilizatorii își creează conturi sau se autentifică pentru a accesa funcții suplimentare.
3. **Explorarea produselor**: Utilizatorii pot filtra și accesa paginile cu detalii pentru fiecare produs.
4. **Plasarea unei comenzi**: Utilizatorii adaugă produse în coș și finalizează comanda.
5. **Lăsarea de recenzii**: După primirea produselor, utilizatorii pot lăsa recenzii pentru a ajuta alți cumpărători.

## Tehnologii utilizate

- **PHP**: limbajul principal de dezvoltare al aplicației.
- **HTML/CSS**: pentru structura și stilizarea interfeței utilizatorului.
- **MySQL**: pentru gestionarea bazei de date.
- **JavaScript**: pentru funcții interactive și validări pe partea de client.

## Concluzie

Această aplicație PHP oferă un set complet de funcționalități pentru administrarea unui magazin online de periferice, fiind extensibilă și ușor de integrat cu funcționalități noi precum gestiunea avansată a utilizatorilor sau module de raportare.
