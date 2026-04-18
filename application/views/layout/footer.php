  <footer class="grid grid-cols-1 gap-12 border-t-8 border-secondary bg-primary px-12 py-16 md:grid-cols-4 mt-auto">
    <!-- Kolom 1: Identitas & Sosial Media -->
    <div>
      <span class="mb-4 block font-headline text-xl text-secondary">
          <?php foreach ($identitas->result() as $indexIdentitas) : ?>
              <?php echo strtoupper($indexIdentitas->nama_identitas); ?>
          <?php endforeach; ?>
      </span>
      <p class="font-serif text-sm italic leading-relaxed text-slate-300">Bertumbuh dalam iman, hidup dalam kasih, dan melayani jemaat dengan sukacita serta pengharapan.</p>
      
      <!-- Social Media Loop Preserved -->
      <div class="mt-6 flex space-x-4">
          <?php
            $query_sosmed=$this->db->query("SELECT * FROM tbl_sosial_media WHERE sosial_media_status='1' ORDER BY id_sosial_media ASC");
          ?>
          <?php foreach($query_sosmed->result() as $sosmed) { ?>
            <a class="flex h-8 w-8 items-center justify-center rounded-full border border-secondary/50 text-secondary transition hover:bg-secondary hover:text-white" href="<?php echo $sosmed->sosial_media_href;?>" target="_blank" aria-label="Social Media">
              <i class="<?php echo $sosmed->sosial_media_icon;?> text-xs"></i>
            </a>
          <?php } ?>
      </div>
    </div>

    <!-- Kolom 2: Informasi -->
    <div>
      <h5 class="mb-6 text-sm font-bold tracking-widest text-white">INFORMASI</h5>
      <ul class="space-y-4 font-serif text-sm italic text-slate-300">
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="<?php echo base_url('#berita');?>">Warta Jemaat</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="<?php echo base_url('#jadwal');?>">Jadwal Ibadah</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="<?php echo base_url('#kontak');?>">Lokasi Gereja</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="<?php echo base_url('#tentang');?>">Tentang Kami</a></li>
      </ul>
    </div>

    <!-- Kolom 3: Pelayanan -->
    <div>
      <h5 class="mb-6 text-sm font-bold tracking-widest text-white">PELAYANAN</h5>
      <ul class="space-y-4 font-serif text-sm italic text-slate-300">
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="javascript:void(0);">Baptisan & Sidi</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="javascript:void(0);">Pernikahan Kudus</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="javascript:void(0);">Konseling Pastoral</a></li>
        <li><a class="block transition hover:translate-x-1 hover:text-secondary" href="javascript:void(0);">Pelayanan Kedukaan</a></li>
      </ul>
    </div>

    <!-- Kolom 4: Kantor Gereja & Visitors -->
    <div>
      <h5 class="mb-6 text-sm font-bold tracking-widest text-white">KANTOR GEREJA</h5>
      <div class="font-serif text-sm italic leading-relaxed text-slate-300 space-y-2">
          <!-- Contact Loops Preserved -->
          <div class="flex items-start gap-2">
              <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
              <span>
                  <?php foreach ($alamat->result() as $indexAlamat) :?><?php echo $indexAlamat->alamat_gereja;?><?php endforeach;?>
              </span>
          </div>
          <div class="flex items-center gap-2 mt-2">
              <span class="material-symbols-outlined text-sm text-secondary">call</span>
              <span>
                  <?php foreach ($tlp->result() as $indexTlp) :?><?php echo $indexTlp->no_tlp;?><?php endforeach;?>
              </span>
          </div>
          <div class="flex items-center gap-2 mt-2 border-b border-white/10 pb-4">
              <span class="material-symbols-outlined text-sm text-secondary">mail</span>
              <span>
                  <?php foreach ($email->result() as $indexEmail) :?><?php echo $indexEmail->alamat_email;?><?php endforeach;?>
              </span>
          </div>

          <!-- Visitors Preserved -->
          <?php
              $queryBlnLalu=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
              $jmlBlnLalu=$queryBlnLalu->num_rows();

              $queryBlnIni=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
              $jmlBlnIni=$queryBlnIni->num_rows();
          ?>
          <div class="pt-2 text-xs flex justify-between">
              <span>Pengunjung (Lalu):</span>
              <span class="text-white font-bold tracking-widest"><?php echo $jmlBlnLalu;?></span>
          </div>
          <div class="text-xs flex justify-between">
              <span>Pengunjung (Ini):</span>
              <span class="text-secondary font-bold tracking-widest"><?php echo $jmlBlnIni;?></span>
          </div>
      </div>

      <div class="mt-8 border-t border-white/10 pt-4 relative">
        <span class="mb-2 block text-xs font-bold uppercase tracking-widest text-secondary">Copyright</span>
        <p class="text-[10px] text-slate-500">
            <?php foreach ($identitas->result() as $indexIdentitas) :?>
                &copy; <?php echo date('Y');?> <a href="<?php echo $indexIdentitas->website_identitas;?>" target="_blank" class="hover:text-white transition-colors"><?php echo $indexIdentitas->nama_identitas;?></a>
            <?php endforeach;?>. All rights reserved.
        </p>

        <!-- Scroll to Top Preserved -->
        <button id="scroll-top" class="absolute -right-6 top-4 w-8 h-8 rounded bg-secondary/20 hover:bg-secondary text-white flex items-center justify-center transition-all duration-300 opacity-0 invisible focus:outline-none" aria-label="Scroll to top">
            <i class="fas fa-angle-up text-xs"></i>
        </button>
      </div>
    </div>
  </footer>

<script>
    // Scroll to top button logic preserved
    document.addEventListener('DOMContentLoaded', function() {
        const scrollBtn = document.getElementById('scroll-top');
        if(!scrollBtn) return;
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.remove('opacity-0', 'invisible');
                scrollBtn.classList.add('opacity-100', 'visible');
            } else {
                scrollBtn.classList.add('opacity-0', 'invisible');
                scrollBtn.classList.remove('opacity-100', 'visible');
            }
        });

        scrollBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>
</body>
</html>
