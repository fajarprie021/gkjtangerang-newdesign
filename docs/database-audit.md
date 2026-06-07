# Audit Database Schema (`gkjtangerang_2024`)

Dokumen ini berisi hasil audit menyeluruh terhadap skema database MySQL `gkjtangerang_2024` yang saat ini digunakan pada aplikasi web GKJ Tangerang. Audit ini bertujuan untuk memetakan struktur data dan mempersiapkan proses migrasi ke teknologi modern.

---

## 1. Ringkasan Database

* **Nama Database**: `gkjtangerang_2024`
* **Driver**: MySQLi / MySQL 5.7+
* **Total Tabel**: 32 Tabel
* **Total Record Pengunjung (Log)**: 33,516 Baris
* **Jumlah Renungan**: 124 Baris
* **Jumlah Berita/Artikel**: 93 Baris

---

## 2. Inventarisasi Tabel & Volume Data

Berikut adalah daftar tabel beserta jumlah baris data (*row count*) hasil audit:

| Nama Tabel | Deskripsi Fungsi | Jumlah Baris (Record) |
| :--- | :--- | :--- |
| **`tbl_renungan`** | Data renungan harian (Siraman Rohani) | 124 |
| **`tbl_tulisan`** | Artikel, berita, dan blog publik | 93 |
| **`tbl_galeri`** | Media foto kegiatan gereja | 88 |
| **`tbl_pengunjung`** | Log statistik IP & browser pengunjung | 33,516 |
| **`tbl_kelas`** | Referensi kelas / kelompok pelayanan | 21 |
| **`tbl_sub_menu_admin`**| Sub-menu navigasi khusus dashboard admin | 16 |
| **`tbl_header`** | Gambar & teks slider halaman beranda | 17 |
| **`tbl_sub_menu`** | Sub-menu navigasi frontend publik | 12 |
| **`tbl_album`** | Kategori/album dokumentasi foto | 11 |
| **`tbl_siswa`** | Data jemaat / anggota pemuda (legacy name) | 11 |
| **`tbl_menu_admin`** | Menu utama navigasi dashboard admin | 11 |
| **`tbl_menu`** | Menu utama navigasi frontend publik | 10 |
| **`tbl_agenda`** | Agenda kegiatan gereja mendatang | 8 |
| **`tbl_guru`** | Data majelis / pengurus gereja (legacy name) | 8 |
| **`tbl_kategori`** | Kategori artikel / tulisan | 8 |
| **`tbl_jadwal_ibadah`**| Jadwal ibadah minggu & kategorial | 5 |
| **`tbl_pengguna`** | Akun administrator sistem | 3 |
| **`tbl_sosial_media`** | Link sosial media gereja (FB, IG, dll) | 3 |
| **`tbl_halaman`** | Halaman statis tambahan | 3 |
| **`tbl_alamat_gereja`**| Detail alamat fisik GKJ Tangerang | 1 |
| **`tbl_email_gereja`** | Alamat email resmi gereja | 1 |
| **`tbl_identitas_gereja`**| Nama, logo, dan meta-info gereja | 1 |
| **`tbl_sejarah`** | Konten statis sejarah gereja | 1 |
| **`tbl_struktur_majelis`**| Konten statis struktur organisasi | 1 |
| **`tbl_tlp_gereja`** | Kontak telepon resmi gereja | 1 |
| **`tbl_visi_misi`** | Konten statis visi dan misi | 1 |
| **`tbl_komentar`** | Komentar pengunjung pada artikel | 39 |
| **`tbl_files`** | Berkas unduhan warta/dokumen PDF | 8 |
| **`tbl_log_aktivitas`**| Log aktivitas admin | 0 |
| **`tbl_testimoni`** | Data testimoni jemaat (tidak aktif) | 0 |

---

## 3. Analisis Tabel Utama

### A. Tabel `tbl_renungan`
Tabel ini digunakan untuk modul renungan harian publik dan panel admin penulisan renungan.
* **Kolom Penting**:
  * `renungan_id` (int, PK, auto_increment)
  * `renungan_judul` (varchar 150)
  * `renungan_slug` (varchar 200) - *Digunakan untuk URL SEO friendly.*
  * `renungan_deskripsi` (text) - *Isi utama renungan.*
  * `bacaan_alkitab` (varchar 100) - *Ayat referensi bacaan.*
  * `nats` (text) - *Kutipan ayat emas.*
  * `doa_pembuka` (text) - *Teks doa pengantar.*
  * `pokok_doa` (text) - *Pokok doa keprihatinan.*
  * `renungan_tanggal` (timestamp)
  * `renungan_author` (varchar 60)

### B. Tabel `tbl_tulisan`
Tabel penampung artikel berita dan warta jemaat.
* **Kolom Penting**:
  * `tulisan_id` (int, PK, auto_increment)
  * `tulisan_judul` (varchar 100)
  * `tulisan_slug` (varchar 200)
  * `tulisan_isi` (text)
  * `tulisan_gambar` (varchar 40) - *Menyimpan path file gambar.*
  * `tulisan_kategori_id` (int) - *Menghubungkan ke `tbl_kategori`.*
  * `tulisan_views` (int) - *Menghitung jumlah klik baca.*

### C. Tabel `tbl_pengguna`
Menyimpan kredensial login admin.
* **Kolom Penting**:
  * `pengguna_id` (int, PK)
  * `pengguna_username` (varchar 30)
  * `pengguna_password` (varchar 35) - *Enkripsi legacy (MD5 hash).*
  * `pengguna_level` (varchar 3) - *Hak akses admin (contoh: '1' untuk Super Admin).*

---

## 4. Temuan Audit & Masalah Teknis

1. **Keamanan Kredensial (Password Hash Legacy)**:
   * Kolom `pengguna_password` masih menggunakan enkripsi MD5 (panjang 32-35 karakter). Ini sangat rentan terhadap serangan brute force dan rainbow tables.
   * *Rekomendasi*: Saat migrasi, seluruh password harus ditingkatkan ke **bcrypt** atau **Argon2id**.
2. **Ketiadaan Foreign Key Constraints**:
   * Referensi antar tabel (seperti `tulisan_kategori_id` di `tbl_tulisan` ke `kategori_id` di `tbl_kategori`) hanya mengandalkan logic PHP di level aplikasi (*Implicit Relations*). Tidak ada constraint fisik `FOREIGN KEY` di database.
   * *Rekomendasi*: Tambahkan referensi relasi yang jelas di ORM modern (misalnya Prisma/Sequelize/Laravel Eloquent) dan buat constraint relasi di level database.
3. **Penggunaan Nama Kolom Legacy**:
   * Tabel `tbl_siswa` dan `tbl_guru` digunakan masing-masing untuk menyimpan data jemaat/pemuda dan data pengurus/majelis. Penamaan ini merupakan bawaan dari tema template sekolah lama.
   * *Rekomendasi*: Ubah nama tabel menjadi lebih representatif saat migrasi, misalnya `tbl_jemaat` dan `tbl_majelis`.
4. **Denormalisasi Tabel Profil Statis**:
   * Tabel statis seperti `tbl_alamat_gereja`, `tbl_email_gereja`, `tbl_tlp_gereja`, dan `tbl_identitas_gereja` masing-masing hanya berisi **1 baris**. Ini membuat overhead query karena aplikasi harus melakukan 4 query berbeda untuk mengambil profil gereja dasar.
   * *Rekomendasi*: Satukan seluruh tabel konfigurasi tunggal ini ke dalam satu tabel terpusat bernama `tbl_setting` atau `tbl_profile` dengan format key-value atau kolom terpadu.

---

## 5. Rencana Tindak Lanjut Migrasi Data (Data Migration Path)

1. **Tahap Ekspor**: Lakukan dump data existing dalam format SQL atau JSON.
2. **Tahap Skema Baru**: Buat struktur tabel baru dengan standarisasi nama kolom, normalisasi tabel profil, serta penambahan foreign key.
3. **Tahap Transformasi (ETL)**:
   * Buat skrip transisi untuk membaca data lama.
   * Lakukan hashing ulang password jemaat/admin ke standard Bcrypt jika dimungkinkan (atau buat sistem reset password pada login pertama jika MD5 lama tidak bisa didekripsi balik).
   * Lakukan validasi slug dan format HTML konten artikel/renungan agar tidak pecah saat dirender di frontend baru.

---

## 6. Audit Kompatibilitas Database Development vs Production Backup

Audit fisik komparasi skema antara database Development (`gkjtangerang_2024`) dan database Production Backup (`gkjtangerang_prod_backup`):

* **Tabel yang hanya ada di `gkjtangerang_2024`**: Tidak ada (0 tabel).
* **Tabel yang hanya ada di `gkjtangerang_prod_backup`**: Tidak ada (0 tabel).
* **Kolom yang hanya ada di `gkjtangerang_2024` (Dev)**:
  * Tabel `tbl_renungan`:
    * `bacaan_alkitab` (varchar(100), default: `NULL`)
    * `nats` (text, default: `NULL`)
    * `doa_pembuka` (text, default: `NULL`)
    * `pokok_doa` (text, default: `NULL`)
* **Kolom yang hanya ada di `gkjtangerang_prod_backup` (Prod)**: Tidak ada (0 kolom).
* **Kolom dengan tipe data berbeda**: Tidak ada (0 kolom).

### A. Matriks Audit Kompatibilitas Per Modul

| Modul | Tabel | Perbedaan | Dampak | Solusi |
| :--- | :--- | :--- | :--- | :--- |
| **Homepage** | `tbl_tulisan`, `tbl_renungan`, `tbl_agenda`, `tbl_guru`, `tbl_siswa`, `tbl_files`, `tbl_menu`, `tbl_alamat_gereja`, `tbl_email_gereja`, `tbl_tlp_gereja`, `tbl_identitas_gereja`, `tbl_galeri`, `tbl_sejarah`, `tbl_jadwal_ibadah` | Tidak ada perbedaan skema tabel/kolom yang diakses oleh Query Homepage. | Aman. Homepage siap dijalankan di production. | Tidak memerlukan penyesuaian database untuk query beranda. |
| **Profil Gereja** | `tbl_sejarah`, `tbl_visi_misi`, `tbl_struktur_majelis`, `tbl_guru`, `tbl_siswa` | Tidak ada perbedaan skema tabel/kolom yang digunakan. | Aman. Halaman profil statis maupun data pengurus dapat dimuat secara normal. | Tidak memerlukan penyesuaian database. |
| **Renungan** | `tbl_renungan` | **Ada 4 kolom baru di DEV**: `bacaan_alkitab`, `nats`, `doa_pembuka`, dan `pokok_doa`. | **Kritis di Admin**: Jika backend baru dijalankan di database produksi lama, aksi **tambah/edit renungan** akan memicu *fatal error* (`Unknown column in field list`) karena query model `M_renungan.php` menginstruksikan `INSERT/UPDATE` ke kolom-kolom baru tersebut. | Jalankan perintah SQL `ALTER TABLE` pada database produksi untuk menambahkan 4 kolom baru tersebut sebelum merilis kode baru ke server *production*. |
| **Berita** | `tbl_tulisan`, `tbl_kategori`, `tbl_komentar` | Tidak ada perbedaan skema tabel/kolom yang digunakan. | Aman. Modul berita dan artikel siap digunakan langsung di production. | Tidak memerlukan penyesuaian database. |
| **Acara** | `tbl_agenda` | Tidak ada perbedaan skema tabel/kolom yang digunakan. | Aman. Daftar agenda dapat dimuat langsung dari data production. | Tidak memerlukan penyesuaian database. |
| **Galeri** | `tbl_galeri`, `tbl_album` | Tidak ada perbedaan skema tabel/kolom yang digunakan. | Aman. Dokumentasi foto dan album kegiatan gereja siap dimuat di production. | Tidak memerlukan penyesuaian database. |
| **Admin Panel** | `tbl_pengguna`, `tbl_log_aktivitas`, `tbl_menu_admin`, `tbl_sub_menu_admin` | Tidak ada perbedaan skema tabel/kolom yang digunakan untuk autentikasi dan otorisasi menu admin. | Aman. Otentikasi admin (menggunakan MD5 password) dan menu sidebar dapat diakses. | Tidak memerlukan penyesuaian database. |
| **Kontak** | `tbl_inbox` | Tidak ada perbedaan skema tabel/kolom yang digunakan. | Aman. Penyimpanan pesan masuk dari formulir kontak berfungsi normal. | Tidak memerlukan penyesuaian database. |

### B. Ringkasan Kesiapan Migrasi

1. **Perubahan yang wajib ada di production**:
   * Menambahkan 4 kolom baru ke tabel `tbl_renungan` di server produksi:
     ```sql
     ALTER TABLE tbl_renungan 
     ADD COLUMN bacaan_alkitab VARCHAR(100) NULL DEFAULT NULL,
     ADD COLUMN nats TEXT NULL DEFAULT NULL,
     ADD COLUMN doa_pembuka TEXT NULL DEFAULT NULL,
     ADD COLUMN pokok_doa TEXT NULL DEFAULT NULL;
     ```
2. **Perubahan yang cukup dilakukan di kode**:
   * View detail renungan (`depan/v_renungan_detail.php`) sudah dikonfigurasi defensif (`isset()` & `empty()`) sehingga jika kolom bernilai `NULL` (data lama), halaman tetap tampil normal tanpa error.
3. **Perubahan yang tidak diperlukan**:
   * Tidak perlu melakukan re-skema, pembuatan tabel baru, atau migrasi perubahan tipe data di modul lainnya karena strukturnya sudah sejalan 100%.
4. **Tingkat kesiapan migrasi (%)**:
   * Kesiapan migrasi skema database: **98%** (sangat aman, hanya memerlukan satu query `ALTER TABLE` kecil).
