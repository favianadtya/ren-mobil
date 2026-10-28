# BTNG Mobil API

REST API showroom mobil menggunakan Laravel 12 dan MySQL. Data mobil disimpan pada tabel `mobil`.

## Menjalankan aplikasi

1. Pastikan PHP 8.2 atau lebih baru, Composer, dan MySQL sudah tersedia.
2. Atur koneksi database aplikasi pada `.env` dan siapkan database MySQL `mobil`.
3. Jalankan migrasi:

   ```powershell
   php artisan migrate
   ```

4. Jalankan server lokal:

   ```powershell
   php artisan serve
   ```

## Endpoint

Semua endpoint menerima dan mengembalikan JSON.

| Metode | Endpoint | Fungsi |
|---|---|---|
| GET | `/api/mobil` | Menampilkan semua mobil |
| GET | `/api/mobil/{id}` | Menampilkan satu mobil |
| POST | `/api/mobil` | Menambahkan mobil |
| PUT | `/api/mobil/{id}` | Mengubah mobil |
| PATCH | `/api/mobil/{id}` | Mengubah sebagian data mobil |
| DELETE | `/api/mobil/{id}` | Menghapus mobil |

Contoh body untuk `POST`:

```json
{
  "nama": "Honda Civic",
  "merk": "Honda",
  "tahun": 2024,
  "warna": "Hitam",
  "harga": 250000000,
  "deskripsi": "Mobil sedan"
}
```

Kolom mobil terdiri dari `nama`, `brand`, `harga`, `tahun`, `transmisi`, `bahan_bakar`, `status`, dan `foto`. `transmisi` menerima `Manual`, `Matic`, atau `CVT`; `bahan_bakar` menerima `Bensin`, `Diesel`, `Hybrid`, atau `Listrik`; `status` menerima `tersedia` atau `sold` dan secara default bernilai `tersedia`. `foto` bersifat opsional.

`PUT` memerlukan `nama`, `merk`, `tahun`, `warna`, dan `harga`; `PATCH` hanya memerlukan nilai yang ingin diubah. Respons berhasil menggunakan status 200 untuk GET dan update, 201 untuk create, serta 204 untuk delete. Data tidak ditemukan menghasilkan 404 dan input tidak valid menghasilkan 422.

## Pengujian

Jalankan pengujian dengan:

```powershell
php artisan test
```

Pengujian API menggunakan koneksi database MySQL yang dikonfigurasi di `.env`.
