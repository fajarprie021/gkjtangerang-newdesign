# AG CONTEXT – FRONTEND REFACTOR CI3 (GKJ TANGERANG)

## PROJECT INFO

- Website: gkjtangerang.org
- Framework: CodeIgniter 3 (FULL)
- Fokus: Frontend / Theme System
- Target style: Tailwind, premium, navy-gold, clean church landing page

---

## WORKING MODE

- Mode: **Batch (super ringkas)**
- Jangan pecah jadi step kecil lagi
- Setiap batch = audit + implement + QA

---

## GLOBAL RULES (WAJIB IKUTI)

- Jangan modifikasi backend logic
- Jangan rename variable existing
- Preserve CI3 compatibility
- Preserve PHP loops & variables
- Preserve `base_url()` dan `site_url()`
- Jangan sentuh file di luar scope step
- Jangan revisit area yang sudah PASS
- Jangan refactor ulang tanpa alasan jelas

---

## CLOSED / JANGAN DISENTUH LAGI

- Homepage refactor → ✅ PASS
- Blog/Warta list → ✅ PASS
- Blog detail → ✅ PASS
- Pagination blog → ✅ FIXED (controller-based, Tailwind styled)
- Layout system → ✅ STABLE

### ⚠️ IMPORTANT

- Pagination MUST NOT diubah lagi
- Jangan pakai Bootstrap class
- Jangan styling pagination di view

---

## LAYOUT SYSTEM

Digunakan secara global:

- `application/views/layout/header.php`
- `application/views/layout/footer.php`
- `application/views/layout/main.php`

Semua page HARUS:

```php
$x['content'] = '...';
$this->load->view('layout/main', $x);
```

---

## AVAILABLE COMPONENTS

Sudah dibuat & dipakai:

1. `components/section_header_left.php`
2. `components/section_header_center.php`
3. `components/card_artikel.php`
4. `components/cta_underline.php`

### RULE

- Reuse komponen jika cocok
- Jangan paksa reuse jika struktur berbeda
- Jangan buat komponen baru tanpa kebutuhan jelas

---

## CURRENT STATE

Sudah selesai:

- Homepage (full componentized)
- Blog list (layout + component)
- Blog detail (layout + theme alignment)

---

## CURRENT STEP

➡️ Step 13 – Profil / Tentang page migration (BATCH)

---

## EXPECTATION FOR NEXT STEPS

Setiap batch HARUS:

1. Audit halaman target
2. Migrasi ke layout/main
3. Jadikan view page-only
4. Apply Tailwind theme
5. Reuse komponen jika cocok
6. Cleanup markup lama
7. QA sekali

---

## DO NOT DO

- Jangan balik ke Bootstrap
- Jangan ubah controller logic kecuali render layout
- Jangan rewrite query/database
- Jangan refactor yang sudah stabil
- Jangan ulang pekerjaan lama

---

## QA CHECKLIST

Setiap selesai batch:

- Tidak ada duplicate `<html>/<head>/<body>`
- Layout tidak rusak
- Data tampil normal
- Loop tetap jalan
- Link tetap jalan
- Responsive aman

---

## GOAL AKHIR

- Semua halaman pakai layout system
- Semua UI konsisten Tailwind
- Komponen reusable stabil
- Code bersih & modular
