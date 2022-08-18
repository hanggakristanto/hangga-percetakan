# hangga-percetakan
Masuk ke Folder & Jalankan Composer

    cd sk-store && composer install

Copy .env 

    cp .env.example .env

Konfigurasi Database

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_skstore
    DB_USERNAME=root
    DB_PASSWORD=

Buat Database

    Silahkan teman-teman buat database baru di dalam http://localhost/phpmyadmin dengan nama db_sktore

Jalankan NPM

    npm install

Migrasi Database

    php artisan migrate

Menjalankan Seeder

    composer dump-autoload
    php artisan db:seed

Symlink Storage

    php artisan storage:link