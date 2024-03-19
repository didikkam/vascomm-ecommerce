
# DIDIKAM VASCOMM ECOMMERCE TEST

## How To Install
Install PHP
```
PHP >= 8.1
Ctype PHP Extension
cURL PHP Extension
DOM PHP Extension
Fileinfo PHP Extension
Filter PHP Extension
Hash PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PCRE PHP Extension
PDO PHP Extension
Session PHP Extension
Tokenizer PHP Extension
XML PHP Extension
```
Install Semua Dependensi
```
composer install
```
Copy .env.example menjadi .env

sesuaikan konfigurasinya
```
cp .env.example .env
```
Lakukan key:generate
```
php artisan key:generate
```
Lakukan migrasi
```
php artisan migrate
php artisan db:seed
```
Lakukan
```
php artisan storage:link
```
User Login
```
email : admin@admin.com
password : secret123
```