Test Code
==========

Menggunakan

- Composer 2
- PHP 8
- PHP Phinx
- PHP dotenv
- MySQL
- XAMPP/LAMPP
- Postman

Instalasi

- clone project dengan cara : clone https://github.com/luqni/rest-api-php.git
- pindahkan folder projek ke folder htdocs XAMPP/LAMPP
- buka terminal
- composer install
- buat database baru di MySQL
- isi configurasi database di file .env
- lakukan migrate dengan perintah di terminal/cli: vendor/bin/phinx migrate -e development
- jalankan seeder dengan perintah di terminal/cli : vendor/bin/phinx seed:run

Penggunaan

*Buka Postman
berikut endpoint yang tersedia :

- GET = http://localhost/folder-projek/transaction : menampilkan list data transaction
- ![alt text](https://github.com/luqni/rest-api-php/blob/main/api_getAll.png)
- GET = http://localhost/folder-projek/transaction?references_id=9&merchant_id=1 : pengecekan data berdasarkan parameter referenes_id dan merchant_id
- ![alt text](https://github.com/luqni/rest-api-php/blob/main/api_check_status.png)
- POST = http://localhost/folder-projek/transaction :insert data transaction body seperti pada gambar
- ![alt text](https://github.com/luqni/rest-api-php/blob/main/api_create_transaction.png)

Menjalankan update status di CLI
- Perintah untuk mengupdate status : php transaction-cli.php
- Masukkan references ID, sistem akan mengecek apakah data tersedia atau tidak jika tersedia.
- Masukkan Status (Paid/Failed)
- ![alt text](https://github.com/luqni/rest-api-php/blob/main/transaction-cli.png)

By : Muhammad Luqni Baehaqi
