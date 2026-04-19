<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-7xl">

        <!-- Admin Header -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
            <div>
                <?php
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title' => 'Daftar Berita'
                ));
                ?>
                <p class="text-gray-600 font-serif mt-2">Kelola semua artikel, berita, dan tulisan yang dipublikasikan.
                </p>
            </div>
            <a href="<?php echo base_url() . 'admin/tulisan/add_tulisan' ?>"
                class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
                + Post Tulisan Baru
            </a>
        </div>

        <!-- Filter Kategori -->
        <div class="flex justify-end mb-4">
            <select id="filterKategori" onchange="filterBerita(this.value)" class="bg-white border border-gray-200 text-xs text-primary rounded-lg px-4 py-2 focus:ring-secondary focus:border-secondary font-headline tracking-widest uppercase shadow-sm outline-none">
                <option value="all">✦ Semua Kategori Berita</option>
                <?php foreach ($kat->result_array() as $k): ?>
                    <option value="<?php echo htmlspecialchars($k['kategori_nama']); ?>">Kategori: <?php echo htmlspecialchars($k['kategori_nama']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
            <div class="w-full">
                <table class="w-full text-left border-collapse table-auto">
                    <thead>
                        <tr
                            class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                            <th class="p-4 w-24 text-center">Gambar</th>
                            <th class="p-4">Judul & Kategori</th>
                            <th class="p-4 w-32">Tanggal</th>
                            <th class="p-4 w-32">Penulis</th>
                            <th class="p-4 w-20 text-center">Views</th>
                            <th class="p-4 w-24 text-right whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 font-serif text-sm">
                        <?php
                        $no = 0;
                        foreach ($data->result_array() as $i):
                            $no++;
                            $tulisan_id = $i['tulisan_id'];
                            $tulisan_judul = $i['tulisan_judul'];
                            $tulisan_isi = $i['tulisan_isi'];
                            $tulisan_tanggal = $i['tanggal'];
                            $tulisan_author = $i['tulisan_author'];
                            $tulisan_gambar = $i['tulisan_gambar'];
                            $tulisan_views = $i['tulisan_views'];
                            $kategori_id = $i['tulisan_kategori_id'];
                            $kategori_nama = $i['tulisan_kategori_nama'];
                            ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors article-row" data-kategori="<?php echo htmlspecialchars($kategori_nama); ?>">
                                <td class="p-3 align-top">
                                    <img src="<?php echo base_url() . 'assets/images/' . $tulisan_gambar; ?>"
                                        class="w-20 h-14 object-cover rounded-lg shadow-sm border border-gray-100 mx-auto">
                                </td>

                                <td class="p-3 align-top">
                                    <span class="font-bold text-primary block text-sm leading-snug mb-1">
                                        <?php echo $tulisan_judul; ?>
                                    </span>
                                    <span
                                        class="inline-block px-2 py-0.5 rounded-full bg-secondary/10 text-secondary text-[10px] font-headline uppercase tracking-wider">
                                        <?php echo $kategori_nama; ?>
                                    </span>
                                </td>

                                <td class="p-3 text-gray-500 italic whitespace-nowrap align-top">
                                    <?php echo $tulisan_tanggal; ?>
                                </td>

                                <td class="p-3 whitespace-nowrap align-top">
                                    <span class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-secondary text-base">person</span>
                                        <?php echo $tulisan_author; ?>
                                    </span>
                                </td>

                                <td class="p-3 text-center whitespace-nowrap align-top">
                                    <span class="flex items-center justify-center gap-1.5 text-gray-500 font-bold">
                                        <span class="material-symbols-outlined text-base">visibility</span>
                                        <?php echo $tulisan_views; ?>
                                    </span>
                                </td>

                                <td class="p-3 text-right whitespace-nowrap align-top">
                                    <a href="<?php echo base_url() . 'admin/tulisan/get_edit/' . $tulisan_id; ?>"
                                        class="inline-flex items-center justify-center text-blue-600 hover:text-blue-800 transition-colors bg-blue-50 p-2 rounded-md"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </a>
                                    <button
                                        onclick="document.getElementById('ModalHapus<?php echo $tulisan_id; ?>').classList.remove('hidden')"
                                        class="inline-flex items-center justify-center text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md ml-1"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if ($no == 0): ?>
                            <tr>
                                <td colspan="6" class="p-12 text-center text-gray-400 italic font-serif text-lg">Belum ada
                                    berita yang dipublikasikan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php foreach ($data->result_array() as $i):
    $tulisan_id = $i['tulisan_id'];
    $tulisan_judul = $i['tulisan_judul'];
    $tulisan_gambar = $i['tulisan_gambar'];
    ?>
    <!-- Modal Hapus -->
    <div id="ModalHapus<?php echo $tulisan_id; ?>"
        class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
            <form action="<?php echo base_url() . 'admin/tulisan/hapus_tulisan' ?>" method="post">
                <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">warning</span>
                </div>
                <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Berita?</h4>
                <p class="text-gray-600 text-sm mb-8 px-4 font-serif leading-relaxed">Apakah Anda yakin mau menghapus
                    postingan <strong><?php echo $tulisan_judul; ?></strong>? Tindakan ini tidak dapat dibatalkan.</p>

                <input type="hidden" name="kode" value="<?php echo $tulisan_id; ?>" />
                <input type="hidden" name="gambar" value="<?php echo $tulisan_gambar; ?>" />

                <div class="flex justify-center gap-3">
                    <button type="button"
                        onclick="document.getElementById('ModalHapus<?php echo $tulisan_id; ?>').classList.add('hidden')"
                        class="px-6 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors">Ya,
                        Hapus</button>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>

<!-- Notifications / Toasts -->
<?php
$msg = $this->session->flashdata('msg');
$allowed_msgs = array('success', 'info', 'success-hapus');
if (in_array($msg, $allowed_msgs, true)):
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil memperbarui data.";
    if ($msg == 'success') {
        $toastText = "Berita berhasil dipublikasikan.";
    } elseif ($msg == 'info') {
        $toastText = "Berita berhasil diperbarui.";
    } elseif ($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Berita berhasil dihapus.";
    }
    ?>
    <div id="toast-msg"
        class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
        <span class="material-symbols-outlined text-2xl"><?php echo $toastIcon; ?></span>
        <span class="text-sm font-bold uppercase tracking-widest"><?php echo $toastText; ?></span>
    </div>
    <script>
        // Toast Auto Close
        setTimeout(() => {
            const toast = document.getElementById('toast-msg');
            if (toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
        }, 4000);
    </script>
<?php endif; ?>

<script>
    // Filter Functionality - Moved outside PHP if block to ensure it always works
    function filterBerita(kat) {
        const rows = document.querySelectorAll('tr.article-row');
        rows.forEach(row => {
            if(kat === 'all' || row.dataset.kategori === kat){
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>