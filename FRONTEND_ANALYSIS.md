# GKJ Tangerang Frontend Redesign Analysis

Documenting the structure, dependencies, and risks for redesigning the legacy CodeIgniter 3 frontend using Tailwind CSS.

## 1. File Map of Frontend-Related Files

```text
project-root/
│
├── application/
│   ├── controllers/
│   │   └── Home.php          (Passes data array $x to the views)
│   └── views/
│       └── depan/
│           ├── v_menu.php    (Header and Navigation bar)
│           ├── v_home.php    (Main Homepage content structure)
│           └── v_footer.php  (Footer, contact info, and copyright)
│
├── assets/
│   └── images/               (Dynamic item images like article thumbnails)
│
└── theme/                    (Static theme assets)
    ├── css/
    │   ├── bootstrap.min.css 
    │   ├── font-awesome.min.css
    │   ├── slick.css & owl.carousel.min.css
    │   └── style.css         (Custom legacy styles)
    ├── js/
    │   ├── jquery.min.js & bootstrap.min.js
    │   └── slick.min.js, owl.carousel.min.js
    └── images/               (Logos, static slider images, UI icons)
```

## 2. Legacy CSS Frameworks & Dependencies
The current frontend is highly dependent on:
- **Bootstrap 4** (`bootstrap.min.css`, `bootstrap.min.js`, `tether.min.js`) for the grid and navbar.
- **jQuery** (`jquery.min.js`) which powers almost all interactive components.
- **Slick Slider & Owl Carousel** (`slick.min.js`, `owl.carousel.min.js`) for the image carousels at the top.
- **Font Awesome & Simple Line Icons** for UI iconography.

## 3. PHP Variables & Loops Used in Homepage Views

### In `v_home.php`:
- `$identitas`: Renders the `<title>` tab name (`$indexIdentitas->nama_identitas`).
- `$galeriHeaderArray`: Iterated with a `for` loop to generate slider indicators and carousel image slides.
- `$sejarah`: Iterated to output a brief "Kata Sambutan" / welcome message limit excerpt.
- `$jadwal_ibadah`: Iterated to display church schedules (`$row->jadwal_ibadah_jam`, `$row->jadwal_ibadah_judul`).
- `$berita`: Iterated in a grid to show recent articles, pulling thumbnail images (`$row->tulisan_gambar`) and titles.
- `$renungan`: Iterated to render recent devotionals with a date, title, and limited description.
- `$agenda`: Iterated to extract specific date units (day/month/year) and an event description.

### In `v_menu.php` (Header):
- `$menu`: Iterated to build the top navigation links.
- **Inline Query:** Executes `$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu")` natively inside the view to construct dropdown links!

### In `v_footer.php`:
- `$tlp`, `$email`, `$alamat`, `$identitas`: Looped over to show contact and copyright info.
- **Inline Queries:** Executes internal queries inside the view to fetch social media links (`$query_sosmed`) and visitor counts (`$queryBlnLalu`, `$queryBlnIni`).

**Rendering Mechanism:** 
Almost all variables are returned as CodeIgniter Query Objects. The views loop through them using `foreach ($variable->result() as $row)` and strictly print the object properties using `echo $row->field_name;`.

## 4. Risks & Mitigation Plan When Redesigning

1. **Direct DB Queries inside Views:** The header and footer files query the database directly instead of treating data strictly through the controller. During the redesign, copying these raw queries exactly as they are is critical to avoid runtime errors.
2. **Carousel Breakage:** If we strip out jQuery and Bootstrap JS in the new Tailwind version, the homepage hero slider (built on Bootstrap Carousel) will break. We must plan to rebuild this slider using pure CSS or explicitly relying on Tailwind layout utility behaviors.
3. **Invalid HTML Concatenation:** `v_menu.php`, `v_home.php`, and `v_footer.php` redundantly all contain `<!DOCTYPE html><head>` and `<body>` tags. This must be structurally cleaned up in the new Tailwind variants so there is one true cleanly nested DOM hierarchy spanning the three files.
4. **Global Header Conflict:** Modifying `v_menu.php` directly could temporarily break the legacy layout of all internally nested pages (like Blog and About) that still rely on Bootstrap 4. 
   - **Mitigation:** We must create new `-tailwind.php` view variants, and make a strictly controlled controller change just inside `Home.php` to load these specific views explicitly for the homepage only to prevent destroying other pages.
