<h1>Requirement</h1>

<h2>
    Tools yang harus diinstall
</h2>

- XAMPP (Windows)
- Apache & Phpmyadmin (Linux)
- VSCode (Windows & Linux)

<br>
<h2>
    Cara Instalasi
</h2>

1. Buka Terminal
2. Jalankan git command

```
git clone git@github.com:gdsctrunojoyo/Web-Intermediate.git
```

3. Pindah ke direktori **Web-Intermediate**
4. Jalankan command berikut untuk menginstall package composer

```
composer install
```
5. Jalankan command berikut untuk generate key
```
php artisan key:generate
```
6. Copy .env.example ke .env
7. Ubah data berikut untuk menyesuaikan config database mysql

```
DB_DATABASE=nama_db
DB_USERNAME=username_db
DB_PASSWORD=pass_db
```

8. Jalankan aplikasi laravel
```
php artisan serve
```
9. Buka browser di localhost:8000


<h2>
List Command
</h2>


<h3>
untuk membuat tabel model, controller dan migration
</h3>

```
php artisan make:model Categories -mcr
```

<br/>

<h3>
untuk migrasi struktur tabel dari file database/migrations/ ke database MySQL
</h3>

```
php artisan migrate
```

<img src="screenshots/1.png"><br/><br/>
<img src="screenshots/2.png">

<br/>

<h3>
untuk insert seeder / data sample yang sudah didefinisikan di database/seeders/
</h3>

```
php artisan db:seed
```

<img src="screenshots/3.png">