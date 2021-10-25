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
6. Jalankan aplikasi laravel
```
php artisan serve
```
7. Buka browser di localhost:8000