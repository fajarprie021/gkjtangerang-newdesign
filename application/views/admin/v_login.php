<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | GKJ Tangerang</title>
    <link rel="shortcut icon" href="<?php echo base_url().'theme/images/logo-gkj-tab.png'?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F172A',     // Slate 900 / Navy
                        secondary: '#E2B147',   // Gold
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass-effect {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 177, 71, 0.2);
        }
    </style>
</head>
<body class="bg-primary min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    
    <!-- Aesthetic Background Elements -->
    <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-secondary/5 blur-[120px]"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-secondary/5 blur-[120px]"></div>

    <div class="w-full max-w-[420px] relative z-10 animate-fade-in">
        
        <!-- Login Card -->
        <div class="glass-effect rounded-3xl p-8 sm:p-10 shadow-2xl overflow-hidden border border-secondary/20">
            
            <!-- Logo area -->
            <div class="text-center mb-10">
                <img src="<?php echo base_url().'theme/images/logo-gkj-header-dark.png'?>" 
                     alt="GKJ Tangerang Logo" 
                     class="h-16 mx-auto mb-6">
                
                <h1 class="text-xl font-bold text-white tracking-widest uppercase">Admin Panel</h1>
                <p class="text-gray-400 text-sm mt-2 tracking-wide font-light">Masuk ke dashboard manajemen gereja</p>
            </div>

            <!-- Error Message -->
            <?php if($this->session->flashdata('msg')): ?>
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center gap-3 text-red-400 text-sm animate-pulse">
                    <span class="material-symbols-outlined text-[18px]">error</span>
                    <span><?php echo $this->session->flashdata('msg'); ?></span>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?php echo site_url().'admin/login/auth'?>" method="post" class="space-y-6">
                
                <!-- Username -->
                <div class="space-y-2 group">
                    <label class="text-[10px] uppercase tracking-[0.3em] text-secondary font-bold ml-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-secondary transition-colors">
                            <span class="material-symbols-outlined text-[20px]">person</span>
                        </div>
                        <input type="text" name="username" 
                               class="block w-full pl-11 pr-4 py-4 bg-primary/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-secondary/50 focus:ring-1 focus:ring-secondary/50 transition-all"
                               placeholder="Masukkan username" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2 group">
                    <label class="text-[10px] uppercase tracking-[0.3em] text-secondary font-bold ml-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-secondary transition-colors">
                            <span class="material-symbols-outlined text-[20px]">lock</span>
                        </div>
                        <input type="password" name="password" 
                               class="block w-full pl-11 pr-4 py-4 bg-primary/50 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:border-secondary/50 focus:ring-1 focus:ring-secondary/50 transition-all"
                               placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Remember Me & Forgot (Visual Only for now) -->
                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-white/10 bg-primary/50 text-secondary focus:ring-offset-primary">
                        <span class="text-[11px] text-gray-400 group-hover:text-gray-300 transition-colors">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-[11px] text-gray-500 hover:text-secondary transition-colors">Lupa Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-4 bg-secondary hover:bg-secondary/90 text-primary font-bold rounded-2xl shadow-lg shadow-secondary/10 transition-all active:scale-[0.98] flex items-center justify-center gap-2 uppercase tracking-widest text-xs mt-4">
                    <span>Masuk Sekarang</span>
                    <span class="material-symbols-outlined text-[18px]">login</span>
                </button>
            </form>

            <div class="mt-10 pt-6 border-t border-white/5 text-center">
                <p class="text-[10px] text-gray-600 uppercase tracking-[0.2em]">
                    &copy; <?php echo date('Y');?> GKJ Tangerang. Crafted for Excellence.
                </p>
            </div>
        </div>
    </div>

</body>
</html>
