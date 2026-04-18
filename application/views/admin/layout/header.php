<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Administrator Panel - GKJ Tangerang</title>

    <!-- Favicon -->
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Alpine.js for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind config -->
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

    <!-- Base styles -->
    <style type="text/tailwindcss">
        @layer base {
          body { font-family: 'Plus Jakarta Sans', sans-serif; }
          .font-headline { font-family: 'Cinzel', serif; }
          .font-serif    { font-family: 'Playfair Display', serif; }
        }
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .scrollbar-thin::-webkit-scrollbar { width: 4px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: rgba(197, 160, 89, 0.2); border-radius: 10px; }
    </style>
</head>

<body class="bg-background text-ink selection:bg-secondary selection:text-white flex flex-col h-screen overflow-hidden">

  <!-- Top bar Header -->
  <header class="h-16 flex-shrink-0 z-50 w-full border-b border-secondary/20 bg-cream/95 backdrop-blur shadow-sm">
    <div class="h-full mx-auto flex items-center justify-between px-6 lg:px-8">
      
      <div class="flex items-center gap-4">
        <!-- Mobile Toggle (Only visible on mobile) -->
        <button class="md:hidden p-2 -ml-2 text-primary hover:bg-primary/5 rounded-lg transition"
                onclick="toggleAdminSidebar()"
                aria-label="Toggle Sidebar">
            <span class="material-symbols-outlined">menu_open</span>
        </button>

        <!-- Brand/Logo -->
        <a href="<?php echo base_url('admin/dashboard');?>" class="flex items-center gap-3">
            <img alt="Logo GKJ Tangerang"
                 class="h-10 w-auto object-contain"
                 src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>"/>
            <div class="hidden sm:block border-l border-secondary/30 pl-3">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-primary block leading-none">Admin</span>
                <span class="text-[8px] font-bold uppercase tracking-[0.2em] text-secondary block mt-0.5">Control Panel</span>
            </div>
        </a>
      </div>

      <!-- Right actions -->
      <div class="flex items-center gap-3 md:gap-6">
          <a href="<?php echo base_url();?>" target="_blank"
             class="flex items-center gap-2 px-3 py-1.5 rounded-full border border-secondary/30 text-[10px] font-bold uppercase tracking-[0.2em] text-primary transition hover:bg-secondary hover:text-white group">
              <span class="material-symbols-outlined text-[16px] group-hover:scale-110 transition">visibility</span>
              <span class="hidden md:inline">Pratinjau Situs</span>
          </a>
          
          <div class="flex items-center gap-3 border-l border-secondary/20 pl-6">
              <div class="hidden lg:block text-right">
                  <span class="block text-[10px] font-bold text-primary uppercase tracking-wider"><?php echo $this->session->userdata('nama');?></span>
                  <span class="block text-[8px] text-secondary uppercase tracking-[0.2em] font-medium"><?php echo ($this->session->userdata('akses')=='1') ? 'Moderator Utama' : 'Administrator';?></span>
              </div>
              <a href="<?php echo base_url('administrator/logout');?>"
                 class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                 title="Keluar">
                  <span class="material-symbols-outlined text-[20px]">power_settings_new</span>
              </a>
          </div>
      </div>

    </div>
  </header>

