# SI-eFishery
Implementasi rancangan sistem informasi eFishery

### Struktur Direktori
- `css` stylesheet web app
- `dump_sql` dummy data untuk migrasi basis data
- `img` direktori gambar statik web app
- `js` script web app
- `middleware` interface antarmuka dan modul web app
- `module` core function web app
- `public` direktori penyimpanan berkas QC (quality control)
- ...

# Instalation Guide
### System Requirements:
`XAMPP 5.+` versi 5 keatas

#### Step #0: Copy Repository to XAMPP `localhost` Directory
Salin seluruh isi repository ini ke direktori aktif lokal XAMPP, biasanya bernama `htdocs`

#### Step #1: Database Migration & Seed
1. Buat sebuah basis data baru pada MySQL
2. Import dummy basis data pada direktori `dump_sql` ke basis data tersebut

#### Step #2: Web App Database Configuration
Ubah credential basis data pada berkas `dbconfig.php` sesuai dengan pengaturan basis data lokal
```
	$HOST = <alamat lokal, biasanya: localhost>;
	$NAME = <nama basis data pada step #1>;
	$USER = <username akses basis data>;
	$PASS = <password akses basis data>;

```

Contoh

```
	$HOST = "localhost";
	$NAME = "ef_manufacture";
	$USER = "root";
	$PASS = "admin";

```

#### Step #3: Running Web App
1. Aktifkan localhost XAMPP
2. Jalankan web app pada browser

### Credits
- Gumilang
- Joshua Atmadja
- Rio