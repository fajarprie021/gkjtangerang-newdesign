<?php
$this->load->view('admin/layout/header');
?>

<div class="flex flex-1 overflow-hidden">
    <!-- Sidebar -->
    <?php $this->load->view('admin/layout/sidebar'); ?>

    <!-- Main Content Area -->
    <main class="flex-1 overflow-y-auto bg-background/50 relative">
        <div class="p-6 md:p-10 max-w-[1600px] mx-auto min-h-full flex flex-col">
            <?php 
            if (isset($content)) {
                $this->load->view($content);
            }
            ?>
        </div>
        
        <!-- Footer in main content area to keep it scrollable with content -->
        <?php $this->load->view('admin/layout/footer'); ?>
    </main>
</div>
