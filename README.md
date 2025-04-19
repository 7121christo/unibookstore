# UNIBOOKSTORE
 
Merupakan aplikasi berbasis web sederhana yang dibangun menggunakan framework Laravel dan Bootstrap. Aplikasi web ini memeiliki beberapa fitur.

## Fitur
- **Manajemen Buku**: Create, read, update, dan delete data buku.
- **Manajemen Penerbit**: Create, read, update, dan delete data penerbit.
- **Laporan Buku**: Mengambil data buku dengan stok paling sedikit.
- **Search Bar**: Mencari buku berdasarkan input user.

## Instalation
### 1. Clone the Repository
```sh
git clone https://github.com/yourusername/unibookstore.git
cd unibookstore
```

### 2. Install Dependencies
```sh
composer install
npm install
```

### 3. Configure the Environment
Copy the `.env.example` file and update database credentials:
```sh
cp .env.example .env
```
Edit `.env` and configure your database connection:
```
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Run Migrations & Seeders
```sh
php artisan migrate --seed
```

### 5. Serve the Application
```sh
php artisan serve
```
Then, open `http://127.0.0.1:8000` in your browser.

## Routes
| Method | URL | Description |
|--------|-----|-------------|
| GET | `/admin` | Menampilkan data buku |
| GET | `/index` | Menampilkan halaman index |
| POST | `/admin/store` | Fitur create buku |
| PUT | `/admin/update/{id}` | Fitur update buku |
| DELETE | `/admin/delete/{id}` | Fitur delete buku |
| GET | `/pengadaan` | Menampilkan halaman pengadaan |
| GET | `/penerbit` | Menampilkan data penerbit |
| POST | `/penerbit` | Fitur create penerbit |
| PUT | `/penerbit/{id}` | Fitur update penerbit |
| DELETE | `/penerbit/{id}` | Fitur delete penerbit |

## Screenshots
### 📌 Halaman Index
![Halaman Index](https://drive.google.com/uc?export=view&id=1JPDiNkZ6t9goAOUxURg63XHzhc4q05Ct)

### 📌 Halaman Admin
![Halaman Admin](https://drive.google.com/uc?export=view&id=1mtNjY3v4mSueGy1L6LP2TGcOvZtNq-t_)

### 📌 Halaman Pengadaan
![Halaman Pengadaan](https://drive.google.com/uc?export=view&id=1xDKMO1GnbNwzWxI4i24sc6-h5B_whmQO)

## License
This project is open-source and available under the [MIT License](LICENSE).

