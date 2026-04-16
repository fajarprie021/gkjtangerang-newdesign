<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Administrator Panel - GKJ Tangerang</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">
    
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1A365D',
            secondary: '#C5A059',
            background: '#F8FAFC',
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
            soft: '0 4px 20px rgba(15, 23, 42, 0.05)'
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
    </style>
</head>

<body class="bg-background text-ink flex flex-col min-h-screen">
  
  <header class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white shadow-sm">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
      <div class="flex items-center gap-4">
          <a href="<?php echo base_url('admin/dashboard');?>" class="flex items-center gap-3">
              <span class="bg-primary text-white p-2 rounded-lg flex items-center justify-center">
                  <span class="material-symbols-outlined">dashboard</span>
              </span>
              <div>
                  <h1 class="font-headline font-bold text-primary text-xl leading-none">Admin Panel</h1>
                  <p class="text-xs text-gray-500 font-serif mt-1">GKJ Tangerang</p>
              </div>
          </a>
      </div>
      
      <!-- Minimalist Admin Navigation -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-semibold text-gray-600">
          <a href="<?php echo base_url('admin/dashboard');?>" class="hover:text-primary transition-colors">Dashboard</a>
          <a href="<?php echo base_url('admin/tulisan');?>" class="hover:text-primary transition-colors">Berita</a>
          <a href="<?php echo base_url('admin/agenda');?>" class="hover:text-primary transition-colors">Agenda</a>
          <a href="<?php echo base_url('admin/files');?>" class="hover:text-primary transition-colors">Download</a>
      </nav>

      <div class="flex items-center gap-4">
          <a href="<?php echo base_url();?>" target="_blank" class="hidden md:flex items-center gap-2 text-sm text-gray-600 hover:text-primary transition-colors">
              <span class="material-symbols-outlined text-[18px]">open_in_new</span>
              View Web
          </a>
          <a href="<?php echo base_url('administrator/logout');?>" class="flex items-center gap-2 bg-red-50 text-red-600 hover:bg-red-100 px-4 py-2 rounded-full text-sm font-bold transition-colors">
              <span class="material-symbols-outlined text-[18px]">logout</span>
              <span class="hidden md:inline">Keluar</span>
          </a>
      </div>
    </div>
  </header>
