Aplicație de Gestiune Hotel
Descriere
Aceasta este o aplicație de gestiune hotel dezvoltată în PHP. Permite gestionarea camerelor, rezervărilor și recenziilor, și include autentificare pentru utilizatori, atât pentru administratori, cât și pentru utilizatori obișnuiți.

Funcționalități

1. Gestionare Camere
   Vizualizare Camere: Listează toate camerele disponibile, cu detalii precum nume, descriere, preț și status.
   Adăugare Cameră Nouă: Administratorii pot adăuga camere noi în baza de date.
   Editare Detalii Cameră: Permite modificarea detaliilor unei camere existente.
   Ștergere Cameră: Oferă opțiunea de a elimina o cameră din baza de date.
2. Gestionare Rezervări
   Adăugare Rezervare: Utilizatorii pot face rezervări pentru camerele disponibile.
   Vizualizare Rezervări: Listează toate rezervările, cu detalii precum utilizator, cameră, dată și preț.
   Anulare Rezervare: Permite utilizatorilor să anuleze rezervările existente.
3. Gestionare Recenzii
   Adăugare Recenzie: Utilizatorii pot lăsa recenzii și evaluări pentru camerele rezervate.
   Vizualizare Recenzii: Listează toate recenziile pentru o cameră specifică.
   Ștergere Recenzie: Permite utilizatorilor sau administratorilor să șteargă o recenzie.
4. Autentificare Utilizatori
   Înregistrare Utilizator Nou: Utilizatorii noi își pot crea un cont.
   Login/Logout: Utilizatorii se pot autentifica pentru a accesa funcționalitățile suplimentare și se pot deconecta.
   Privilegii de Administrator: Conturile de administrator au acces la funcții suplimentare, cum ar fi gestionarea camerelor și a utilizatorilor.
   Configurare
   Clonare proiect: Clonați acest proiect pe serverul local.
   Configurare baza de date:
   Importați fișierul SQL în baza de date (hotel_management.sql).
   Configurare conexiune PDO:
   Editați fișierul pdo.php și actualizați detaliile bazei de date (host, nume, utilizator și parolă).
   Rularea aplicației:
   Deschideți aplicația în browser accesând http://localhost/numele-proiectului.
   Structură Fișiere
   config/: Conține fișierul pentru conexiunea PDO.
   controllers/: Conține logica aplicației, precum gestionarea camerelor, rezervărilor și recenziilor.
   views/: Fișiere pentru interfața de utilizator (HTML + PHP).
   migrations/: Scripturi pentru configurarea bazei de date.
   index.php: Punctul de intrare al aplicației.
   Utilizare
   Autentificați-vă cu un cont de administrator sau utilizator.
   Accesați funcționalitățile aplicației:
   Gestionați camerele (adăugare, editare, ștergere).
   Faceți rezervări și lăsați recenzii.
   Vizualizați datele în interfața prietenoasă sau în baza de date pentru verificare.
