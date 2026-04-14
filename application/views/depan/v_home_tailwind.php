<?php
if (!function_exists('limit_words')) {
    function limit_words($string, $word_limit) {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
}
if (!function_exists('limit_sentences')) {
    function limit_sentences($content, $limit) {
        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', strip_tags($content));
        return implode(' ', array_slice($sentences, 0, $limit)) . '...';
    }
}
?>
<main class="flex-grow flex flex-col">
    <!-- Hero Section Preserved temporarily -->
    <section class="relative flex min-h-[92vh] items-center justify-center overflow-hidden">
        <!-- Carousel Background Layer & Slide Content -->
        <div id="carousel-inner" class="absolute inset-0 flex transition-transform duration-700 ease-in-out h-full w-full z-0">
            <?php foreach ($galeriHeaderArray as $key => $image) : ?>
                <div class="h-full w-full flex-shrink-0 relative">
                    <div class="absolute inset-0 z-0">
                        <img class="h-full w-full object-cover" src="<?php echo base_url($image); ?>" alt="Background Header" />
                        <div class="absolute inset-0 bg-primary/65 mix-blend-multiply"></div>
                        <div class="absolute inset-0 bg-gradient-to-b from-primary/10 via-transparent to-primary/90"></div>
                    </div>
                    
                    <?php if ($key == 0): ?>
                        <div class="absolute inset-0 flex items-center justify-center z-10 mx-auto max-w-5xl px-4 text-center pointer-events-none">
                            <div class="pointer-events-auto">
                                <span class="mb-6 block text-sm uppercase tracking-[0.45em] text-secondary font-headline">Sugeng Rawuh — Selamat Datang</span>
                                <h1 class="font-headline text-5xl leading-tight text-white md:text-7xl lg:text-8xl">Ngabekti Kanthi<br/>
                                    <span class="text-secondary italic font-serif tracking-normal pr-4">Tulus lan Asih</span>
                                </h1>
                                <p class="mx-auto mt-8 max-w-3xl text-lg leading-relaxed text-white/85 md:text-2xl font-serif italic">"Menjadi saksi Kristus yang menghidupi iman di tengah indahnya budaya Jawa Tengah."</p>
                                <div class="mt-12 flex flex-col items-center justify-center gap-5 md:flex-row shadow-soft">
                                  <a class="inline-flex items-center gap-2 bg-secondary px-10 py-4 text-xs font-bold uppercase tracking-[0.25em] text-white transition hover:bg-white hover:text-primary" href="#jadwal">
                                    <span class="material-symbols-outlined text-sm">calendar_month</span>
                                    IBADAH LIVE
                                  </a>
                                  <a class="inline-flex border-2 border-white px-10 py-4 text-xs font-bold uppercase tracking-[0.25em] text-white transition hover:bg-white hover:text-primary" href="#berita">JADWAL KEGIATAN</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/50 z-20">
            <span class="material-symbols-outlined animate-bounce">expand_more</span>
        </div>
        
        <!-- Controls preserved -->
        <button id="carousel-prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/10 hover:bg-white/30 text-white rounded-full p-4 transition-colors hidden md:block focus:outline-none z-20">
            <i class="fas fa-chevron-left text-2xl"></i>
        </button>
        <button id="carousel-next" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/10 hover:bg-white/30 text-white rounded-full p-4 transition-colors hidden md:block focus:outline-none z-20">
            <i class="fas fa-chevron-right text-2xl"></i>
        </button>
        <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3 z-20">
            <?php foreach ($galeriHeaderArray as $key => $image) : ?>
                <button class="carousel-dot w-3 h-3 rounded-full <?php echo ($key == 0) ? 'bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)]' : 'bg-white/30 hover:bg-white/60'; ?> transition-all focus:outline-none" data-slide="<?php echo $key; ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 3-Cards Link Row mapped visually from reference -->
    <section class="relative z-20 -mt-20 mx-auto max-w-7xl px-6">
      <div class="grid grid-cols-1 overflow-hidden shadow-soft md:grid-cols-3">
        <article class="group bg-white p-10 border-b-8 border-secondary transition-all duration-500 hover:bg-primary cursor-pointer" onclick="window.location.href='#jadwal'">
          <div class="mb-8 flex h-16 w-16 items-center justify-center border border-secondary/30 bg-cream rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:bg-secondary">
            <span class="material-symbols-outlined -rotate-45 text-3xl text-primary transition-all duration-500 group-hover:rotate-0 group-hover:text-white">live_tv</span>
          </div>
          <h3 class="font-headline text-xl tracking-wider text-primary group-hover:text-white">IBADAH</h3>
          <p class="mt-4 text-sm leading-relaxed text-muted group-hover:text-white/80">Lihat jadwal ibadah Minggu, ibadah khusus, dan siaran langsung untuk jemaat dan pengunjung baru.</p>
          <a class="mt-6 inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.3em] text-secondary group-hover:text-white" href="#jadwal">Lihat Sekarang <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
        </article>

        <article class="group bg-cream p-10 border-b-8 border-primary transition-all duration-500 hover:bg-primary cursor-pointer" onclick="window.location.href='#berita'">
          <div class="mb-8 flex h-16 w-16 items-center justify-center border border-secondary/30 bg-white rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:bg-secondary">
            <span class="material-symbols-outlined -rotate-45 text-3xl text-primary transition-all duration-500 group-hover:rotate-0 group-hover:text-white">event_note</span>
          </div>
          <h3 class="font-headline text-xl tracking-wider text-primary group-hover:text-white">KEGIATAN</h3>
          <p class="mt-4 text-sm leading-relaxed text-muted group-hover:text-white/80">Ikuti informasi kegiatan jemaat, pelayanan, pembinaan, dan agenda gereja terbaru.</p>
          <a class="mt-6 inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.3em] text-primary group-hover:text-white" href="#berita">Lihat Agenda <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
        </article>

        <article class="group bg-white p-10 border-b-8 border-secondary transition-all duration-500 hover:bg-primary cursor-pointer" onclick="window.location.href='#renungan'">
          <div class="mb-8 flex h-16 w-16 items-center justify-center border border-secondary/30 bg-cream rotate-45 transition-all duration-500 group-hover:rotate-0 group-hover:bg-secondary">
            <span class="material-symbols-outlined -rotate-45 text-3xl text-primary transition-all duration-500 group-hover:rotate-0 group-hover:text-white">menu_book</span>
          </div>
          <h3 class="font-headline text-xl tracking-wider text-primary group-hover:text-white">RENUNGAN</h3>
          <p class="mt-4 text-sm leading-relaxed text-muted group-hover:text-white/80">Temukan renungan harian untuk menguatkan iman, pengharapan, dan langkah hidup setiap hari.</p>
          <a class="mt-6 inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.3em] text-secondary group-hover:text-white" href="#renungan">Baca Renungan <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
        </article>
      </div>
    </section>

    <!-- Jadwal Ibadah -->
    <section id="jadwal" class="relative overflow-hidden bg-cream px-6 py-24">
      <div class="batik-overlay absolute inset-0"></div>
      <div class="relative z-10 mx-auto max-w-4xl">
        <?php 
        $this->load->view('components/section_header_center', array(
            'title'    => 'JADWAL IBADAH',
            'subtitle' => 'Pratélan Ibadah mingguan GKJ Tangerang',
            'divider'  => true
        )); 
        ?>

        <div class="heritage-frame shadow-soft">
          <div class="space-y-8">
            <?php foreach ($jadwal_ibadah->result() as $row) : ?>
            <div class="flex flex-col justify-between border-b border-primary/20 pb-6 last:border-0 last:pb-0 md:flex-row md:items-center">
              <div>
                <h4 class="font-headline text-lg text-primary"><?php echo $row->jadwal_ibadah_judul; ?></h4>
                <p class="font-serif italic text-muted">Ibadah Komunitas GKJ Tangerang</p>
              </div>
              <span class="mt-3 text-2xl tracking-widest text-secondary font-headline md:mt-0"><?php echo $row->jadwal_ibadah_jam; ?> WIB</span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Tentang GKJT -->
    <section id="tentang" class="overflow-hidden bg-white px-6 py-24">
      <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-16 lg:grid-cols-2">
        <div class="relative">
          <div class="relative z-10 aspect-[4/5] overflow-hidden bg-slate-200">
            <img class="h-full w-full object-cover grayscale transition duration-700 hover:grayscale-0" src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1200&q=80" alt="Komunitas gereja" />
          </div>
          <div class="absolute -left-8 -top-8 h-32 w-32 border-8 border-secondary"></div>
          <div class="absolute -bottom-8 -right-8 z-20 max-w-xs bg-primary p-8 text-white shadow-soft">
            <p class="font-headline text-xl tracking-widest">GKJ TANGERANG</p>
            <p class="mt-2 text-[10px] uppercase tracking-[0.3em] opacity-70">Warisan Iman & Pelayanan</p>
          </div>
        </div>

        <div>
          <?php 
          $this->load->view('components/section_header_left', array(
              'eyebrow' => 'Tentang GKJ Tangerang',
              'title'   => 'BERTUMBUH BERSAMA DALAM IMAN DAN PELAYANAN'
          )); 
          ?>
          <div class="mt-8 text-lg leading-relaxed text-muted font-serif">
            <?php foreach ($sejarah->result() as $row) : ?>
                <p class="mb-6"><?php echo limit_sentences($row->tulisan_isi, 3); ?></p>
            <?php endforeach; ?>
          </div>
          <div class="mt-10 grid gap-6 sm:grid-cols-2">
            <div class="border-l-4 border-secondary pl-5">
              <h3 class="font-headline text-lg text-primary">Visi</h3>
              <p class="mt-2 text-sm text-muted">Menjadi komunitas yang dewasa dalam iman dan membawa damai Kristus.</p>
            </div>
            <div class="border-l-4 border-secondary pl-5">
              <h3 class="font-headline text-lg text-primary">Misi</h3>
              <p class="mt-2 text-sm text-muted">Melayani jemaat, membina keluarga, dan menjadi berkat bagi lingkungan sekitar.</p>
            </div>
          </div>
          <div class="mt-8">
            <?php 
            $this->load->view('components/cta_underline', array(
                'url'            => site_url('tentang/halaman/sejarah'),
                'text'           => 'Baca Sejarah Lengkap',
                'class_override' => 'inline-flex'
            )); 
            ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Renungan (Pulled from latest DB entry) -->
    <section id="renungan" class="relative overflow-hidden bg-primary px-6 py-28 text-white">
      <div class="batik-overlay absolute inset-0 opacity-10"></div>
      <div class="relative z-10 mx-auto max-w-4xl text-center">
        <?php 
        $this->load->view('components/section_header_center', array(
            'eyebrow'         => 'Renungan Harian',
            'title'           => '',
            'divider'         => false,
            'container_class' => 'text-center'
        )); 
        ?>
        <span class="material-symbols-outlined mb-8 text-5xl text-secondary">format_quote</span>
        <?php foreach ($renungan->result() as $index => $row) : ?>
            <?php if ($index == 0) : ?>
            <blockquote>
              <p class="font-serif text-3xl italic leading-tight md:text-5xl line-clamp-3">“<?php echo $row->renungan_judul; ?>”</p>
              <cite class="mt-8 block not-italic text-sm font-headline tracking-[0.3em] text-secondary"><?php echo $row->tanggal; ?></cite>
            </blockquote>
            <p class="mx-auto mt-10 max-w-3xl leading-relaxed text-white/80 line-clamp-4"><?php echo strip_tags($row->renungan_deskripsi); ?></p>
            <div class="mt-12 flex flex-col justify-center gap-4 sm:flex-row">
              <a class="border border-secondary px-8 py-3 text-[10px] font-bold uppercase tracking-[0.2em] text-secondary transition hover:bg-secondary hover:text-white" href="<?php echo site_url('renungan/halaman/'.str_replace(" ","-",$row->renungan_judul));?>">BACA SEPENUHNYA</a>
              <a class="bg-secondary px-8 py-3 text-[10px] font-bold uppercase tracking-[0.2em] text-white transition hover:bg-white hover:text-primary" href="<?php echo site_url('renungan'); ?>">ARSIP RENUNGAN</a>
            </div>
            <?php break; endif; ?>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Warta Jemaat Grid -->
    <section id="berita" class="bg-white px-6 py-24">
      <div class="mx-auto max-w-7xl">
        <div class="mb-16 flex items-end justify-between">
          <?php 
          $this->load->view('components/section_header_left', array(
              'eyebrow' => 'Informasi Terbaru',
              'title'   => 'WARTA JEMAAT'
          )); 
          ?>
          <?php 
          $this->load->view('components/cta_underline', array(
              'url'            => site_url('blog'),
              'text'           => 'Lihat Semua Warta',
              'class_override' => 'hidden md:block'
          )); 
          ?>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-3 lg:grid-cols-4">
            <?php foreach ($berita->result() as $index => $row) : ?>
                <?php $this->load->view('components/card_artikel', array('item' => $row)); ?>
            <?php endforeach; ?>
        </div>
        <div class="mt-12 text-center md:hidden">
            <?php 
            $this->load->view('components/cta_underline', array(
                'url'  => site_url('blog'),
                'text' => 'LIHAT SEMUA WARTA'
            )); 
            ?>
        </div>
      </div>
    </section>

    <!-- Kontak & Maps -->
    <section id="kontak" class="border-t border-primary/15 bg-cream py-24">
      <div class="mx-auto grid max-w-7xl grid-cols-1 overflow-hidden shadow-soft lg:grid-cols-2">
        <div class="h-[420px] bg-slate-200">
           <iframe allowfullscreen="" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126934.34188350118!2d106.5518296!3d-6.177402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8e84df9a28b%3A0xeab5e8ce169a83eb!2sTangerang%20City%2C%20Banten!5e0!3m2!1sen!2sid!4v1696860000000!5m2!1sen!2sid" style="border:0;" width="100%"></iframe>
        </div>
        <div class="border-l-8 border-secondary bg-primary p-12 text-white md:p-16 flex flex-col justify-center">
          <h2 class="font-headline text-3xl uppercase tracking-widest">Lokasi & Kontak</h2>
          <div class="mt-10 space-y-8">
            <div class="flex gap-5">
              <span class="material-symbols-outlined text-secondary">location_on</span>
              <div>
                <h5 class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-secondary">Alamat Gereja</h5>
                <p class="leading-relaxed text-white/80">
                  <?php foreach ($alamat->result() as $indexAlamat) :?><?php echo $indexAlamat->alamat_gereja;?><?php endforeach;?>
                </p>
              </div>
            </div>
            <div class="flex gap-5">
              <span class="material-symbols-outlined text-secondary">mail</span>
              <div>
                <h5 class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-secondary">Email Kami</h5>
                <p class="text-white/80">
                  <?php foreach ($email->result() as $indexEmail) :?><?php echo $indexEmail->alamat_email;?><?php endforeach;?>
                </p>
              </div>
            </div>
            <div class="flex gap-5">
              <span class="material-symbols-outlined text-secondary">call</span>
              <div>
                <h5 class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-secondary">Hubungi Kami</h5>
                <p class="text-white/80">
                  <?php foreach ($tlp->result() as $indexTlp) :?><?php echo $indexTlp->no_tlp;?><?php endforeach;?>
                </p>
              </div>
            </div>
          </div>
          
          <?php $query_sosmed=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_status='1' ORDER BY id_sosial_media ASC"); ?>
          <div class="mt-12 flex gap-4">
             <?php foreach($query_sosmed->result() as $sosmed) { ?>
             <a class="inline-flex h-10 w-10 items-center justify-center border border-white/20 transition hover:border-secondary hover:bg-secondary" href="<?php echo $sosmed->sosial_media_href;?>" target="_blank" aria-label="Social Media">
               <i class="<?php echo $sosmed->sosial_media_icon;?> text-base"></i>
             </a>
             <?php } ?>
          </div>
        </div>
      </div>
    </section>

</main>

<script>
    // Vanilla JS Carousel for Hero Section
    document.addEventListener('DOMContentLoaded', function() {
        const inner = document.getElementById('carousel-inner');
        const dots = document.querySelectorAll('.carousel-dot');
        const prev = document.getElementById('carousel-prev');
        const next = document.getElementById('carousel-next');
        if(!inner || dots.length === 0) return;
        
        const total = <?php echo count($galeriHeaderArray); ?>;
        let currentSlide = 0;

        function updateSlide(index) {
            currentSlide = index;
            if (currentSlide >= total) currentSlide = 0;
            if (currentSlide < 0) currentSlide = total - 1;
            inner.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === currentSlide);
                dot.classList.toggle('bg-white/40', i !== currentSlide);
            });
        }
        function nextSlide() { updateSlide(currentSlide + 1); }
        function prevSlide() { updateSlide(currentSlide - 1); }

        if (next) next.addEventListener('click', () => { nextSlide(); });
        if (prev) prev.addEventListener('click', () => { prevSlide(); });
        
        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                updateSlide(parseInt(e.target.dataset.slide));
            });
        });
        
        setInterval(nextSlide, 7000);
    });
</script>
