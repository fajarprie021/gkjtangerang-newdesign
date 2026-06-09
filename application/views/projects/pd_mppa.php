<?php
$focus_areas = [
    [
        'title' => 'Pembinaan Iman',
        'description' => 'Mendorong pertumbuhan rohani melalui persekutuan, pendalaman Alkitab, dan pendampingan yang relevan.'
    ],
    [
        'title' => 'Pelayanan Kolaboratif',
        'description' => 'Membuka ruang kerja bersama lintas komisi, wilayah, dan jemaat agar pelayanan berjalan saling menguatkan.'
    ],
    [
        'title' => 'Pemberdayaan Komunitas',
        'description' => 'Mengembangkan program yang menjawab kebutuhan nyata warga, keluarga, dan lingkungan sekitar.'
    ]
];

$programs = [
    'Kelas pembinaan berkala untuk anggota dan pengurus.',
    'Kalender kegiatan tahunan yang terarah dan mudah diikuti.',
    'Dokumentasi program serta publikasi informasi pelayanan.',
    'Kemitraan pelayanan dengan unit jemaat dan komunitas terkait.'
];

$highlights = [
    'Arah pelayanan yang lebih terstruktur.',
    'Komunikasi program yang lebih jelas kepada jemaat.',
    'Landing page siap dikembangkan dengan konten dinamis berikutnya.'
];
?>

<section class="relative overflow-hidden bg-cream">
    <div class="absolute inset-0 batik-overlay"></div>
    <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-10 lg:py-24">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
            <div>
                <span class="inline-flex items-center rounded-full border border-secondary/30 bg-white/80 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.35em] text-secondary">
                    Project Baru
                </span>
                <h1 class="mt-6 max-w-4xl font-headline text-4xl leading-tight text-primary md:text-5xl lg:text-6xl">
                    PD MPPA
                </h1>
                <p class="mt-6 max-w-2xl font-serif text-lg leading-relaxed text-muted">
                    Halaman ini disiapkan sebagai fondasi project baru PD MPPA, dengan tampilan publik yang siap dipakai untuk memperkenalkan visi, program, dan arah pelayanan secara lebih terstruktur.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#program" class="inline-flex items-center rounded-sm bg-secondary px-6 py-3 text-xs font-bold uppercase tracking-[0.3em] text-white transition hover:bg-primary">
                        Lihat Program
                    </a>
                    <a href="<?php echo base_url(); ?>" class="inline-flex items-center rounded-sm border border-primary/15 bg-white px-6 py-3 text-xs font-bold uppercase tracking-[0.3em] text-primary transition hover:border-secondary hover:text-secondary">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>

            <div class="heritage-frame shadow-soft">
                <div class="grid gap-5">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-[0.35em] text-secondary">Ringkasan</span>
                        <h2 class="mt-3 font-headline text-2xl text-primary">Arah awal untuk identitas PD MPPA</h2>
                    </div>
                    <div class="space-y-4">
                        <?php foreach ($highlights as $highlight): ?>
                            <div class="flex items-start gap-3 border-b border-secondary/10 pb-4 last:border-b-0">
                                <span class="material-symbols-outlined mt-0.5 text-secondary">check_circle</span>
                                <p class="text-sm leading-relaxed text-muted"><?php echo $highlight; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white px-6 py-20 lg:px-10">
    <div class="mx-auto max-w-7xl">
        <?php
        $this->load->view('components/section_header_center', [
            'eyebrow' => 'Fokus Utama',
            'title' => 'Pilar Project PD MPPA',
            'subtitle' => 'Struktur awal ini dibuat supaya halaman dapat langsung dikembangkan menjadi profil, pusat informasi, atau landing page program.'
        ]);
        ?>

        <div class="grid gap-6 md:grid-cols-3">
            <?php foreach ($focus_areas as $item): ?>
                <article class="rounded-sm border border-secondary/15 bg-cream p-8 shadow-soft">
                    <span class="text-xs font-bold uppercase tracking-[0.35em] text-secondary">Pilar</span>
                    <h3 class="mt-4 font-headline text-2xl text-primary"><?php echo $item['title']; ?></h3>
                    <p class="mt-4 font-serif leading-relaxed text-muted"><?php echo $item['description']; ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="program" class="bg-primary px-6 py-20 text-white lg:px-10">
    <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <span class="text-xs font-bold uppercase tracking-[0.35em] text-secondary">Program Awal</span>
            <h2 class="mt-4 font-headline text-4xl">Siap Diisi Sesuai Kebutuhan PD MPPA</h2>
            <p class="mt-5 max-w-xl font-serif text-lg leading-relaxed text-slate-200">
                Saat ini halaman sudah disusun sebagai project dasar. Konten program, jadwal, struktur tim, galeri, dan formulir dapat kita sambungkan berikutnya sesuai kebutuhan operasional PD MPPA.
            </p>
        </div>

        <div class="grid gap-4">
            <?php foreach ($programs as $index => $program): ?>
                <div class="flex items-start gap-4 rounded-sm border border-white/10 bg-white/5 p-5 backdrop-blur-sm">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-secondary/30 text-sm font-bold text-secondary">
                        <?php echo $index + 1; ?>
                    </span>
                    <p class="pt-2 text-sm leading-relaxed text-slate-100"><?php echo $program; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-background px-6 py-20 lg:px-10">
    <div class="mx-auto max-w-5xl rounded-sm border border-secondary/15 bg-white p-10 text-center shadow-soft md:p-14">
        <span class="text-xs font-bold uppercase tracking-[0.35em] text-secondary">Next Step</span>
        <h2 class="mt-4 font-headline text-4xl text-primary">Project dasar PD MPPA sudah siap</h2>
        <p class="mx-auto mt-5 max-w-2xl font-serif text-lg leading-relaxed text-muted">
            Kalau kamu mau, tahap berikutnya kita bisa lanjut isi konten asli PD MPPA, tambah menu khusus, sambungkan ke database, atau buat versi admin untuk kelola halaman ini.
        </p>
    </div>
</section>
