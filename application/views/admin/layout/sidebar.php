<aside id="admin-sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-primary transition-transform duration-300 transform md:translate-x-0 -translate-x-full md:relative md:flex flex-col border-r border-secondary/20 shadow-xl">
    <!-- Sidebar Header - Matching top bar brand height -->
    <div class="h-16 flex items-center px-6 border-b border-secondary/10 bg-primary/95">
        <span class="text-[10px] font-bold uppercase tracking-[0.4em] text-secondary">Navigasi Utama</span>
    </div>

    <!-- Scrollable content -->
    <div class="flex-1 overflow-y-auto py-4 space-y-1 scrollbar-thin scrollbar-thumb-secondary/20">

        <!-- Dashboard Link -->
        <a href="<?php echo base_url('admin/dashboard'); ?>"
            class="flex items-center gap-3 px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] transition group
                  <?php echo ($this->uri->segment(2) == 'dashboard') ? 'bg-secondary text-primary' : 'text-white/70 hover:text-white hover:bg-white/5'; ?>">
            <div class="w-5 flex-shrink-0 flex items-center justify-center">
                <span class="material-symbols-outlined text-[18px]">dashboard</span>
            </div>
            <span class="leading-tight">Dashboard</span>
        </a>

        <!-- Dynamic Menu Loop -->
        <?php foreach ($menu->result() as $indexAllMenu): ?>
            <?php
            $sub_menu = $indexAllMenu->id_menu;
            $query = $this->db->query("SELECT * FROM tbl_sub_menu_admin WHERE id_menu = $sub_menu");
            $has_submenu = ($query->num_rows() > 0);
            $is_active_parent = false; // Detect if any child is active
        
            if ($has_submenu) {
                foreach ($query->result() as $sm) {
                    $href = preg_replace("/[^a-zA-Z0-9]/", "", $sm->sub_menu_href);
                    if ($this->uri->segment(2) == $href) {
                        $is_active_parent = true;
                        break;
                    }
                }
            } else {
                if ($this->uri->segment(2) == $indexAllMenu->menu_href) {
                    $is_active_parent = true;
                }
            }
            ?>

            <?php if ($has_submenu): ?>
                <!-- Menu with Submenu (Dropdown/Accordion style) -->
                <div x-data="{ open: <?php echo $is_active_parent ? 'true' : 'false'; ?> }" class="space-y-1">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] transition text-left group
                                   <?php echo $is_active_parent ? 'text-secondary bg-white/5' : 'text-white/70 hover:text-white hover:bg-white/5'; ?>">
                        <div class="flex items-center gap-3 overflow-hidden">
                            <div class="w-5 flex-shrink-0 flex items-center justify-center">
                                <i class="<?php echo str_replace('fa ', 'fas ', $indexAllMenu->menu_icon); ?> text-[16px]"></i>
                            </div>
                            <span class="leading-tight"><?php echo $indexAllMenu->menu_name; ?></span>
                        </div>
                        <span class="material-symbols-outlined transition-transform duration-200 text-[18px] flex-shrink-0 ml-2"
                            :class="open ? 'rotate-180' : ''">expand_more</span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-black/10 py-1">
                        <?php foreach ($query->result() as $submenu):
                            $resultReplace_NamePage = preg_replace("/[^a-zA-Z0-9]/", "", $submenu->sub_menu_href);

                            if (strtolower($resultReplace_NamePage) == 'strukturmajelis') {
                                $resultReplace_NamePage = 'StrukturMajelis';
                            }
                            if (strtolower($resultReplace_NamePage) == 'visimisi') {
                                $resultReplace_NamePage = 'VisiMisi';
                            }

                            $is_child_active = (strtolower($this->uri->segment(2)) == strtolower($resultReplace_NamePage));
                            ?>
                            <?php if ($submenu->sub_menu_status == 1): ?>
                                <a href="<?php echo site_url('admin/' . $resultReplace_NamePage); ?>" class="flex items-center gap-3 pl-14 pr-6 py-3 text-[10px] font-medium uppercase tracking-[0.2em] transition
                  <?php echo $is_child_active ? 'text-secondary' : 'text-white/50 hover:text-white'; ?>">
                                    <div class="w-4 flex-shrink-0 flex items-center justify-center">
                                        <i class="<?php echo str_replace('fa ', 'fas ', $submenu->sub_menu_icon); ?> text-[12px]"></i>
                                    </div>
                                    <span class="leading-tight"><?php echo $submenu->nama_sub_menu; ?></span>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php else: ?>
                <!-- Single Menu Link -->
                <?php
                $href = ($indexAllMenu->id_halaman == 1)
                    ? base_url('admin/') . $indexAllMenu->menu_href
                    : base_url('admin/informasi/halaman/') . $indexAllMenu->menu_href;
                $is_active = ($indexAllMenu->id_halaman == 1 && $this->uri->segment(2) == $indexAllMenu->menu_href);
                ?>
                <a href="<?php echo $href; ?>"
                    class="flex items-center gap-3 px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] transition group
                          <?php echo $is_active ? 'bg-secondary text-primary' : 'text-white/70 hover:text-white hover:bg-white/5'; ?>">
                    <div class="w-5 flex-shrink-0 flex items-center justify-center">
                        <i class="<?php echo str_replace('fa ', 'fas ', $indexAllMenu->menu_icon); ?> text-[16px]"></i>
                    </div>
                    <span class="leading-tight"><?php echo $indexAllMenu->menu_name; ?></span>
                </a>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-secondary/10 bg-black/20">
        <a href="<?php echo base_url('administrator/logout'); ?>"
            class="flex items-center gap-3 px-4 py-3 text-[10px] font-bold uppercase tracking-[0.3em] text-red-400 hover:text-red-300 hover:bg-red-950/20 rounded transition">
            <div class="w-5 flex-shrink-0 flex items-center justify-center">
                <span class="material-symbols-outlined text-[18px]">logout</span>
            </div>
            <span>Keluar Sesi</span>
        </a>
    </div>
</aside>

<!-- Overlay for mobile sidebar -->
<div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/50 backdrop-blur-sm hidden md:hidden"
    onclick="toggleAdminSidebar()">
</div>

<script>
    function toggleAdminSidebar() {
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>