#Project UKK 2017
Ini Adalah project UKK web design RPL SMK Negeri 5 Gorontalo. 
##Cara Install
Pertama buka command line dan clone datanya
```
git clone https://github.com/smkn5gorontalo/ukk-2017.git
```
Pindah ke direktori ukk-2017
```
cd ukk-2017
```
Run composer install di command prompt untuk menginstall semua plugin
```
composer install
```
Buat database baru dengan nama "penjualan_buku". kemudian ketikkan script berikut di command line
```
php artisan migrate --seed
php artisan serve
```
buka di browser http://localhost:8000

Username/Password
- admin/123456 Untuk Level Admin
* kasir1/123456 Untuk level Kasir
