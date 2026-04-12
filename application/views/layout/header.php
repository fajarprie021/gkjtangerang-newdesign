<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <!-- Dynamic PHP Title -->
    <title>
        <?php foreach ($identitas->result() as $indexIdentitas) : ?>
            Selamat Datang di <?php echo $indexIdentitas->nama_identitas; ?>
        <?php endforeach; ?>
    </title>
    <!-- PHP Base URL for Favicon -->
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Tailwind Config from Final Reference -->
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1A365D',
            secondary: '#C5A059',
            background: '#FFFDF9',
            surface: '#FFFFFF',
            cream: '#F9F5F0',
            ink: '#0F172A',
            muted: '#475569'
          },
          fontFamily: {
            headline: ['Cinzel', 'serif'],
            body: ['Plus Jakarta Sans', 'sans-serif'],
            serif: ['Playfair Display', 'serif']
          },
          boxShadow: {
            soft: '0 20px 60px rgba(15, 23, 42, 0.10)'
          }
        }
      }
    }
    </script>
    <style type="text/tailwindcss">
        @layer base {
          body { font-family: 'Plus Jakarta Sans', sans-serif; }
          .font-headline { font-family: 'Cinzel', serif; }
          .font-serif { font-family: 'Playfair Display', serif; }
        }
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .batik-overlay {
          background-image: radial-gradient(#C5A059 0.5px, transparent 0.5px);
          background-size: 24px 24px;
          opacity: 0.05;
        }
        .heritage-frame {
          border: 2px solid #C5A059;
          position: relative;
          padding: 2rem;
          background: #fff;
        }
        .heritage-frame::before {
          content: '';
          position: absolute;
          inset: -10px;
          border: 1px solid #C5A059;
          pointer-events: none;
        }
    </style>
</head>

<body class="bg-background text-ink selection:bg-secondary selection:text-white flex flex-col min-h-screen">

  <header class="sticky top-0 z-50 w-full border-b-2 border-secondary bg-[#F9F5F0]/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-10">
      
      <!-- Keeping the old logo temporarily -->
      <div class="flex items-center gap-3">
        <a href="<?php echo site_url('');?>" class="flex items-center gap-3">
            <img alt="Logo" class="h-14 w-auto object-contain" src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>"/>
        </a>
      </div>

      <!-- Desktop Navigation mapped to PHP loops but adapted to reference CSS -->
      <nav class="hidden md:flex items-center gap-8">
            <?php foreach ($menu->result() as $indexAllMenu) :?>
                <?php
                    $sub_menu=$indexAllMenu->id_menu;
                    $query=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu");
                ?>
                <?php if ($query->num_rows() > 0): ?>
                    <div class="relative group">
                        <button class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item flex items-center">
                            <?php echo $indexAllMenu->menu_name; ?>
                            <i class="fas fa-chevron-down ml-1 text-[8px]"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute z-10 left-0 mt-2 w-56 rounded-sm shadow-soft bg-surface border border-[#F9F5F0] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top pb-2">
                            <div class="w-full h-1 bg-secondary mb-2"></div>
                            <div class="py-1 flex flex-col">
                                <?php foreach($query->result() as $submenu) { ?>
                                    <?php if ($submenu->id_halaman == 1): ?>
                                        <?php if ($submenu->sub_menu_href == 'berita'): ?>
                                            <a href="<?php echo base_url('blog') ?>" class="px-4 py-2 text-[10px] tracking-widest uppercase text-primary hover:bg-cream transition-colors"><i class="fas fa-angle-right text-secondary mr-3"></i><?php echo $submenu->nama_sub_menu ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo base_url('blog/kategori/'.str_replace(" ","-",$submenu->sub_menu_href)) ?>" class="px-4 py-2 text-[10px] tracking-widest uppercase text-primary hover:bg-cream transition-colors"><i class="fas fa-angle-right text-secondary mr-3"></i><?php echo $submenu->nama_sub_menu ?></a>
                                        <?php endif; ?>
                                    <?php elseif ($submenu->id_halaman == 2): ?>
                                        <a href="<?php echo base_url('informasi/halaman/'.$submenu->sub_menu_href) ?>" class="px-4 py-2 text-[10px] tracking-widest uppercase text-primary hover:bg-cream transition-colors"><i class="fas fa-angle-right text-secondary mr-3"></i><?php echo $submenu->nama_sub_menu ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('tentang/halaman/'.$submenu->sub_menu_href) ?>" class="px-4 py-2 text-[10px] tracking-widest uppercase text-primary hover:bg-cream transition-colors"><i class="fas fa-angle-right text-secondary mr-3"></i><?php echo $submenu->nama_sub_menu ?></a>
                                    <?php endif; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if ($indexAllMenu->menu_href == 'renungan'): ?>
                        <a href="<?php echo base_url('informasi/halaman/').$indexAllMenu->menu_href;?>" class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item"><?php echo $indexAllMenu->menu_name; ?></a>
                    <?php else: ?>
                        <a href="<?php echo base_url().$indexAllMenu->menu_href;?>" class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item"><?php echo $indexAllMenu->menu_name; ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach;?>
      </nav>

      <div class="flex items-center gap-3">
        <!-- Kept mobile toggle beside CTA -->
        <div class="flex items-center md:hidden mr-2">
            <button type="button" class="text-primary hover:text-secondary focus:outline-none" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation container -->
    <div id="mobile-menu" class="hidden md:hidden bg-surface border-t border-secondary/10 mt-0 shadow-inner">
        <div class="px-4 py-3 space-y-1 bg-cream">
            <?php foreach ($menu->result() as $indexAllMenu) :?>
                <?php
                    $sub_menu=$indexAllMenu->id_menu;
                    $query=$this->db->query("SELECT * FROM tbl_sub_menu WHERE id_menu = $sub_menu");
                ?>
                <?php if ($query->num_rows() > 0): ?>
                    <div class="block px-2 py-3 text-xs font-bold tracking-widest text-primary uppercase border-b border-[#E2E8F0]">
                        <?php echo $indexAllMenu->menu_name; ?>
                    </div>
                    <div class="pl-4 pb-2 space-y-1">
                        <?php foreach($query->result() as $submenu) { ?>
                            <?php if ($submenu->id_halaman == 1): ?>
                                <?php if ($submenu->sub_menu_href == 'berita'): ?>
                                    <a href="<?php echo base_url('blog') ?>" class="block px-3 py-2 text-[10px] font-bold tracking-widest text-muted hover:text-primary hover:bg-white uppercase transition-colors"><i class="fas fa-angle-right text-secondary mr-2 text-xs"></i><?php echo $submenu->nama_sub_menu ?></a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('blog/kategori/'.str_replace(" ","-",$submenu->sub_menu_href)) ?>" class="block px-3 py-2 text-[10px] font-bold tracking-widest text-muted hover:text-primary hover:bg-white uppercase transition-colors"><i class="fas fa-angle-right text-secondary mr-2 text-xs"></i><?php echo $submenu->nama_sub_menu ?></a>
                                <?php endif; ?>
                            <?php elseif ($submenu->id_halaman == 2): ?>
                                <a href="<?php echo base_url('informasi/halaman/'.$submenu->sub_menu_href) ?>" class="block px-3 py-2 text-[10px] font-bold tracking-widest text-muted hover:text-primary hover:bg-white uppercase transition-colors"><i class="fas fa-angle-right text-secondary mr-2 text-xs"></i><?php echo $submenu->nama_sub_menu ?></a>
                            <?php else: ?>
                                <a href="<?php echo base_url('tentang/halaman/'.$submenu->sub_menu_href) ?>" class="block px-3 py-2 text-[10px] font-bold tracking-widest text-muted hover:text-primary hover:bg-white uppercase transition-colors"><i class="fas fa-angle-right text-secondary mr-2 text-xs"></i><?php echo $submenu->nama_sub_menu ?></a>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                <?php else: ?>
                    <?php if ($indexAllMenu->menu_href == 'renungan'): ?>
                        <a href="<?php echo base_url('informasi/halaman/').$indexAllMenu->menu_href;?>" class="block px-2 py-3 text-xs font-bold tracking-widest text-primary hover:text-secondary hover:bg-white uppercase border-b border-[#E2E8F0] transition-colors"><?php echo $indexAllMenu->menu_name; ?></a>
                    <?php else: ?>
                        <a href="<?php echo base_url().$indexAllMenu->menu_href;?>" class="block px-2 py-3 text-xs font-bold tracking-widest text-primary hover:text-secondary hover:bg-white uppercase border-b border-[#E2E8F0] transition-colors"><?php echo $indexAllMenu->menu_name; ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach;?>
        </div>
    </div>
  </header>
