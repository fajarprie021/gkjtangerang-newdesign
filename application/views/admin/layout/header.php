<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Administrator Panel - GKJ Tangerang</title>

    <!-- Favicon — exact path from layout/header.php line 14 -->
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">

    <!-- Tailwind CDN — exact from layout/header.php line 17 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts — exact from layout/header.php line 20-21 -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Tailwind config — exact tokens from layout/header.php lines 25-47 -->
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary:    '#1A365D',
            secondary:  '#C5A059',
            background: '#FFFDF9',
            surface:    '#FFFFFF',
            cream:      '#F9F5F0',
            ink:        '#0F172A',
            muted:      '#475569'
          },
          fontFamily: {
            headline: ['Cinzel', 'serif'],
            body:     ['Plus Jakarta Sans', 'sans-serif'],
            serif:    ['Playfair Display', 'serif']
          },
          boxShadow: {
            soft: '0 20px 60px rgba(15, 23, 42, 0.10)'
          }
        }
      }
    }
    </script>

    <!-- Base styles — exact from layout/header.php lines 49-76 -->
    <style type="text/tailwindcss">
        @layer base {
          body { font-family: 'Plus Jakarta Sans', sans-serif; }
          .font-headline { font-family: 'Cinzel', serif; }
          .font-serif    { font-family: 'Playfair Display', serif; }
        }
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<!-- body class — exact from layout/header.php line 79 -->
<body class="bg-background text-ink selection:bg-secondary selection:text-white flex flex-col min-h-screen">

  <!-- header class — exact from layout/header.php line 81 -->
  <header class="sticky top-0 z-50 w-full border-b-2 border-secondary bg-[#F9F5F0]/95 backdrop-blur">

    <!-- inner container — exact from layout/header.php line 82 -->
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-10">

      <!-- Logo — exact img path from layout/header.php line 87, exact class h-14 w-auto object-contain -->
      <div class="flex items-center gap-3">
        <a href="<?php echo base_url('admin/dashboard');?>" class="flex items-center gap-3">
            <img alt="Logo GKJ Tangerang"
                 class="h-14 w-auto object-contain"
                 src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>"/>
        </a>
      </div>

      <!-- Desktop Nav — exact nav class from layout/header.php line 92 -->
      <!-- nav link class — exact from layout/header.php line 100 & 128 -->
      <nav class="hidden md:flex items-center gap-8">
          <a href="<?php echo base_url('admin/dashboard');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Dashboard</a>
          <a href="<?php echo base_url('admin/tulisan');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Berita</a>
          <a href="<?php echo base_url('admin/agenda');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Agenda</a>
          <a href="<?php echo base_url('admin/galeri');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Galeri</a>
          <a href="<?php echo base_url('admin/files');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Download</a>
          <a href="<?php echo base_url('admin/renungan');?>"
             class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary nav-item">Renungan</a>
      </nav>

      <!-- Right actions -->
      <div class="flex items-center gap-4">
          <a href="<?php echo base_url();?>" target="_blank"
             class="hidden md:flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.28em] text-primary transition hover:text-secondary">
              <span class="material-symbols-outlined text-[16px]">open_in_new</span>
              View Web
          </a>
          <a href="<?php echo base_url('administrator/logout');?>"
             class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.28em] text-red-600 hover:text-red-800 transition">
              <span class="material-symbols-outlined text-[16px]">logout</span>
              <span class="hidden md:inline">Keluar</span>
          </a>
          <!-- Mobile toggle -->
          <button class="md:hidden text-primary"
                  onclick="document.getElementById('admin-mobile-nav').classList.toggle('hidden')"
                  aria-label="Menu">
              <span class="material-symbols-outlined">menu</span>
          </button>
      </div>
    </div>

    <!-- Mobile Nav — same link classes as desktop -->
    <div id="admin-mobile-nav" class="hidden md:hidden bg-[#F9F5F0] border-t border-secondary/20 px-6 py-4 space-y-1">
        <a href="<?php echo base_url('admin/dashboard');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Dashboard</a>
        <a href="<?php echo base_url('admin/tulisan');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Berita</a>
        <a href="<?php echo base_url('admin/agenda');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Agenda</a>
        <a href="<?php echo base_url('admin/galeri');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Galeri</a>
        <a href="<?php echo base_url('admin/files');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Download</a>
        <a href="<?php echo base_url('admin/renungan');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-primary hover:text-secondary border-b border-primary/10 transition">Renungan</a>
        <a href="<?php echo base_url('administrator/logout');?>"
           class="block px-2 py-3 text-[11px] font-bold uppercase tracking-[0.28em] text-red-600 transition">Keluar</a>
    </div>
  </header>

