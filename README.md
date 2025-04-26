# Laravel fullstack CRUD aplikacija - Vrtić

## Koraci za preuzimanje

1. Kloniraj repozitorijum unutar xampp/htdocs: 
    ```bash
    git clone https://github.com/Filip000151/Laravel-Vrtic.git
    ```
2. Pređi u klonirani direktorijum:
    ```bash
    cd Laravel-Vrtic
    ```
3. Kopiraj .env fajl:
    ```bash
    copy .env.example .env
    ```
4. Instaliraj php zavisnosti:
    ```bash
    composer install
    ```
5. Instaliraj npm zavisnosti:
    ```bash
    npm install
    ```
6. Po potrebi, izmeni parametre za bazu podataka u .env fajlu i kreiraj bazu u phpMyAdmin
7. Generiši aplikacioni ključ:
    ```bash
    php artisan key:generate
    ```
8. Pokreni migracije i seedere:
    ```bash
    php artisan migrate:fresh --seed
    ```
9. Pokreni Vite frontend server:
    ```bash
    npm run dev
    ```
10. Otvori drugi terminal u istoj destinaciji i pokreni Laravel server:
    ```bash
    php artisan serve
    ```

 
