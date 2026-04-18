# DEV PROTOCOL – CI3 FRONTEND REFACTOR

## 1. PURPOSE

Dokumen ini menjadi aturan kerja utama untuk refactor frontend project **gkjtangerang.org** berbasis **CodeIgniter 3**.

Tujuan:

- menjaga refactor tetap aman
- mencegah AG / developer mengulang pekerjaan
- memastikan style system konsisten
- menjaga compatibility dengan CI3 existing

---

## 2. PROJECT PROFILE

- Project: `gkjtangerang.org`
- Framework: **CodeIgniter 3**
- Scope utama: **frontend / theme system**
- Design target: **Tailwind, premium, navy-gold, clean church landing page**

---

## 3. WORKING MODE

Gunakan mode:

**Batch execution (super ringkas)**

Artinya:

- jangan pecah jadi step terlalu kecil
- satu batch = audit + implement + QA
- satu batch fokus pada **1 halaman** atau **1 kelompok halaman serupa**

---

## 4. GLOBAL NON-NEGOTIABLE RULES

Semua refactor wajib mengikuti ini:

- Jangan modifikasi backend logic
- Jangan rename variable existing
- Preserve CI3 compatibility
- Preserve PHP loops and variables
- Preserve `base_url()` dan `site_url()`
- Jangan ubah query/database logic
- Jangan sentuh file di luar scope batch
- Jangan revisit area yang sudah PASS tanpa alasan jelas
- Jangan paksa component reuse jika struktur layout berbeda
- Jangan buat komponen baru jika komponen lama sudah cukup

---

## 5. CLOSED ITEMS / DO NOT TOUCH

Area berikut dianggap stabil dan **tidak boleh disentuh ulang** kecuali ada bug baru yang nyata:

- Homepage refactor → PASS
- Blog/Warta list → PASS
- Blog detail → PASS
- Pagination Blog → FIXED
- Layout system → STABLE

### Important

Pagination:

- styling pagination harus di controller config CI3
- jangan styling pagination dengan patch HTML di view
- jangan gunakan Bootstrap pagination class lagi
- anggap pagination issue sudah closed

---

## 6. GLOBAL LAYOUT STANDARD

Semua halaman target refactor harus mengikuti layout system ini:

### Layout files

- `application/views/layout/header.php`
- `application/views/layout/footer.php`
- `application/views/layout/main.php`

### Controller render pattern

```php
$x['content'] = 'path/view_name';
$this->load->view('layout/main', $x);
```

### View standard

View halaman harus:

- page-only
- tidak mengandung wrapper global `<html>`, `<head>`, `<body>`
- tidak menyimpan navbar/footer global di dalam file page

---

## 7. AVAILABLE COMPONENTS

Komponen yang sudah tersedia dan boleh dipakai ulang:

1. `application/views/components/section_header_left.php`
2. `application/views/components/section_header_center.php`
3. `application/views/components/card_artikel.php`
4. `application/views/components/cta_underline.php`

### Reuse rule

- pakai jika cocok secara natural
- jangan paksa reuse jika struktur markup berbeda jauh
- `card_artikel` hanya untuk pattern card artikel yang memang cocok
- `cta_underline` hanya untuk underline CTA/link sekunder
- `section_header_*` untuk page/section header yang memang sesuai

---

## 8. BATCH EXECUTION RULE

Setiap batch harus mengikuti urutan tetap ini:

### A. Audit

Cari:

- controller yang dipakai
- method yang merender halaman
- file view yang aktif
- apakah full-page atau page-only
- partial terkait jika ada

### B. Migration

Jika belum pakai layout system:

- update controller ke `layout/main`
- ubah view jadi page-only
- pindahkan elemen global ke layout

Jika sudah pakai layout:

- jangan ubah yang tidak perlu

### C. Theme alignment

Rapikan visual agar konsisten dengan theme baru:

- Tailwind
- premium navy-gold
- clean layout
- nyaman dibaca

### D. Component reuse

Gunakan komponen existing hanya bila cocok.

### E. Cleanup

- hapus wrapper lama
- hapus duplicate markup
- rapikan struktur
- jangan ubah backend logic

### F. QA

Lakukan 1x QA setelah batch selesai.

---

## 9. QA MASTER CHECKLIST

Setiap batch harus lolos checklist ini:

- tidak ada duplicate `<html>`
- tidak ada duplicate `<head>`
- tidak ada duplicate `<body>`
- navbar/footer global tidak dobel
- layout render normal
- data tampil normal
- loop PHP tetap berjalan
- variable PHP tetap aman
- `base_url()` aman
- `site_url()` aman
- responsive behavior aman
- tidak ada regression visual besar
- tidak ada logic backend yang berubah

---

# PAGE CHECKLISTS

## 10. CHECKLIST – HOMEPAGE

Gunakan saat review homepage atau halaman mirip landing page.

### Audit

- cek layout/main sudah dipakai
- cek homepage view sudah page-only
- cek hero, section, CTA, cards

### Must preserve

- hero slider JS
- variable PHP existing
- section data
- old logo sementara
- hero content lama sementara

### QA

- header render benar
- footer render benar
- Tailwind aktif
- hero jalan
- section tampil normal
- CTA/link normal
- no duplicated wrapper

Status homepage saat ini:

- CLOSED / PASS

---

## 11. CHECKLIST – BLOG / WARTA LIST PAGE

### Audit

- controller Blog
- method list/index/kategori/search
- view list blog/warta
- fallback/oops page terkait jika dipakai

### Migration target

- layout/main
- page-only view
- modern Tailwind layout
- article list tetap jalan

### Safe reuse candidates

- `section_header_left`
- `card_artikel`
- `cta_underline`

### Must preserve

- loop artikel
- kategori/search behavior
- link artikel
- pagination logic

### QA

- list tampil
- item artikel tampil
- pagination tampil rapi
- search/category page aman
- no duplicate html/head/body

Status blog list saat ini:

- CLOSED / PASS

---

## 12. CHECKLIST – BLOG DETAIL PAGE

### Audit

- method detail
- view detail
- sidebar / related / popular / comments block
- external plugin/script yang dipakai

### Migration target

- layout/main
- page-only view
- Tailwind article reading layout

### Reuse candidates

- `section_header_left`
- `section_header_center`
- `cta_underline`

### Must preserve

- judul artikel
- body content
- featured image
- metadata
- komentar & balasan
- plugin/script yang diperlukan
- related/popular content jika ada

### QA

- artikel tampil penuh
- komentar tampil
- form komentar aman
- image aman
- sidebar aman
- no duplicate html/head/body

Status blog detail saat ini:

- CLOSED / PASS

---

## 13. CHECKLIST – STATIC PROFILE / TENTANG PAGE

### Audit

- controller halaman tentang/profil
- view utama
- subhalaman terkait:
  - sejarah
  - visi misi
  - profil gereja
  - majelis / pengurus
  - halaman statis serupa

### Migration target

- layout/main
- page-only view
- Tailwind premium static page layout

### Reuse candidates

- `section_header_left`
- `section_header_center`
- `cta_underline`

### Must preserve

- isi konten statis
- gambar existing
- link internal
- slug / routing existing
- variable existing jika ada

### QA

- judul halaman tampil
- konten tampil utuh
- image aman
- CTA aman
- sidebar/nav internal aman
- no duplicate html/head/body

Status saat ini:

- CURRENT ACTIVE TARGET

---

## 14. CHECKLIST – EVENT / KEGIATAN PAGE

### Audit

- controller dan method halaman kegiatan
- apakah list / detail terpisah
- apakah ada date/event metadata

### Migration target

- layout/main
- page-only view
- Tailwind list/detail structure

### Reuse candidates

- `section_header_left`
- `section_header_center`
- `cta_underline`

### Must preserve

- tanggal/jadwal
- title event
- link detail
- filter/category jika ada

### QA

- list event tampil
- tanggal aman
- link aman
- no duplicate wrapper

Status:

- NOT STARTED

---

## 15. CHECKLIST – CONTACT / LOKASI PAGE

### Audit

- controller
- view contact
- map/embed/form/contact info

### Migration target

- layout/main
- page-only view
- Tailwind contact layout

### Reuse candidates

- `section_header_left`
- `section_header_center`
- `cta_underline`

### Must preserve

- alamat
- nomor kontak
- form jika ada
- embed map jika ada
- jam layanan jika ada

### QA

- form tidak rusak
- info kontak tampil
- embed aman
- no duplicate wrapper

Status:

- NOT STARTED

---

## 16. PROMPT RULES FOR AG / ASSISTANT

Saat memulai batch baru, AG harus mengikuti aturan ini:

- baca `AG_CONTEXT.md` dan `DEV_PROTOCOL.md` dulu
- anggap dua file itu sebagai source of truth
- jangan ulang pekerjaan yang closed
- jangan sentuh area di luar scope batch
- jangan revisit pagination
- jangan ubah backend logic
- jangan rename variable
- preserve CI3 compatibility
- lakukan batch dalam format:
  - audit
  - implement
  - cleanup
  - QA

---

## 17. REQUIRED OUTPUT FORMAT FOR EVERY BATCH

Setiap batch harus mengembalikan output ini:

- files reviewed
- files changed
- components reused
- issues found
- status: pass / fail
- next recommended step

Output harus singkat.

---

## 18. CURRENT MIGRATION ORDER

Urutan kerja yang disarankan:

1. Homepage → DONE
2. Blog/Warta list → DONE
3. Blog detail → DONE
4. Profil/Tentang → CURRENT
5. Event/Kegiatan
6. Contact/Lokasi
7. halaman lain yang tersisa

---

## 19. DEFINITION OF DONE

Satu halaman dianggap selesai jika:

- sudah pakai `layout/main`
- view sudah page-only
- styling sudah sejalan dengan Tailwind theme
- komponen sudah direuse jika cocok
- tidak ada duplicate wrapper global
- QA pass
- tidak ada regression logic

---

## 20. FINAL NOTE

Jika ada konflik antara “ingin cepat” dan “ingin aman”:

- pilih aman untuk backend/logic
- pilih cepat untuk markup cleanup
- jangan over-refactor
- jangan membuat abstraction yang belum dibutuhkan
