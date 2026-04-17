<section class="bg-cream px-6 py-24 min-h-screen">
    <div class="mx-auto max-w-7xl space-y-10">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <?php
                $this->load->view('components/section_header_left', array(
                    'eyebrow' => 'Administrator',
                    'title'   => 'Data Renungan'
                ));
                ?>
                <p class="mt-2 max-w-2xl text-gray-600 font-serif">
                    Kelola daftar renungan harian dengan tampilan admin yang konsisten dengan modul baru.
                </p>
            </div>

            <button
                type="button"
                onclick="document.getElementById('myModal').classList.remove('hidden')"
                class="inline-flex items-center justify-center gap-2 rounded-full bg-secondary px-6 py-3 text-sm font-headline uppercase tracking-[0.2em] text-white shadow-soft transition hover:bg-primary"
            >
                <span class="material-symbols-outlined text-[18px]">add</span>
                Tambah Renungan
            </button>
        </div>

        <?php $total_renungan = $data->num_rows(); ?>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft">
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary/70">Total Renungan</p>
                <div class="mt-3 flex items-end justify-between gap-4">
                    <p class="font-headline text-4xl text-primary"><?php echo $total_renungan; ?></p>
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/5 text-secondary">
                        <span class="material-symbols-outlined">menu_book</span>
                    </span>
                </div>
            </div>
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft">
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary/70">Status Modul</p>
                <p class="mt-3 font-serif text-lg text-gray-700">Sudah mengikuti baseline admin baru.</p>
            </div>
            <div class="rounded-xl border border-primary/10 bg-white p-6 shadow-soft">
                <p class="text-[11px] font-bold uppercase tracking-[0.28em] text-primary/70">Fokus Konten</p>
                <p class="mt-3 font-serif text-lg text-gray-700">Judul, deskripsi, tanggal post, dan author.</p>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border-t-4 border-primary bg-white shadow-soft">
            <div class="flex flex-col gap-3 border-b border-gray-100 px-6 py-5 md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="font-headline text-lg tracking-[0.16em] text-primary">Daftar Renungan</h3>
                    <p class="mt-1 text-sm text-gray-500">List data aktif yang tersedia di modul admin.</p>
                </div>
                <div class="inline-flex items-center gap-2 rounded-full bg-primary/5 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-primary">
                    <span class="material-symbols-outlined text-[16px] text-secondary">inventory_2</span>
                    <?php echo $total_renungan; ?> item
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-[860px] w-full border-collapse text-left">
                    <thead>
                        <tr class="border-b border-primary/15 bg-primary/5 text-primary">
                            <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-[0.2em]">#</th>
                            <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-[0.2em]">Judul</th>
                            <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-[0.2em]">Deskripsi</th>
                            <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-[0.2em]">Tanggal Post</th>
                            <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-[0.2em]">Author</th>
                            <th class="px-6 py-4 text-right text-[11px] font-bold uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="font-serif text-sm text-gray-700">
                        <?php
                        $no=0;
                        foreach ($data->result_array() as $i) :
                            $no++;
                            $renungan_id=$i['renungan_id'];
                            $renungan_judul=$i['renungan_judul'];
                            $renungan_deskripsi=$i['renungan_deskripsi'];
                            $renungan_author=$i['renungan_author'];
                            $tanggal=$i['tanggal'];
                        ?>
                        <tr class="border-b border-gray-100 align-top transition hover:bg-gray-50/70">
                            <td class="px-6 py-5 text-gray-400"><?php echo $no; ?></td>
                            <td class="px-6 py-5">
                                <p class="font-bold text-primary"><?php echo $renungan_judul; ?></p>
                            </td>
                            <td class="px-6 py-5 text-gray-600">
                                <div class="max-w-xl leading-6">
                                    <?php echo strip_tags($renungan_deskripsi); ?>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-gray-500"><?php echo $tanggal; ?></td>
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 rounded-full bg-secondary/10 px-3 py-1 text-xs text-primary">
                                    <span class="material-symbols-outlined text-[16px] text-secondary">person</span>
                                    <?php echo $renungan_author; ?>
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.remove('hidden')"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-50 text-blue-600 transition hover:bg-blue-100 hover:text-blue-700"
                                        title="Edit"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>
                                    <button
                                        type="button"
                                        onclick="document.getElementById('ModalHapus<?php echo $renungan_id; ?>').classList.remove('hidden')"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-red-50 text-red-600 transition hover:bg-red-100 hover:text-red-700"
                                        title="Hapus"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <?php if($no == 0): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-base text-gray-500">
                                Belum ada data renungan.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-[90vh] w-full max-w-2xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl">
        <form action="<?php echo base_url().'admin/renungan/simpan_renungan'?>" method="post" enctype="multipart/form-data" class="flex h-full flex-col">
            <div class="flex items-center justify-between bg-primary px-6 py-4 text-white">
                <h4 class="font-headline text-lg tracking-[0.16em]">Tambah Renungan</h4>
                <button
                    type="button"
                    onclick="document.getElementById('myModal').classList.add('hidden')"
                    class="text-white/80 transition hover:text-white"
                >
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="space-y-5 overflow-y-auto p-6 font-serif">
                <div>
                    <label class="mb-2 block text-sm font-headline text-primary">Judul Renungan</label>
                    <input
                        type="text"
                        name="xrenungan_judul"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary"
                        placeholder="Masukkan judul renungan"
                        required
                    >
                </div>
                <div>
                    <label class="mb-2 block text-sm font-headline text-primary">Deskripsi</label>
                    <textarea
                        name="xdeskripsi"
                        rows="8"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary"
                        placeholder="Tulis isi renungan di sini..."
                        required
                    ></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4">
                <button
                    type="button"
                    onclick="document.getElementById('myModal').classList.add('hidden')"
                    class="px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-gray-600 transition hover:text-gray-800"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="rounded-md bg-secondary px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-white shadow-sm transition hover:bg-primary"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<?php foreach ($data->result_array() as $i) :
    $renungan_id=$i['renungan_id'];
    $renungan_judul=$i['renungan_judul'];
    $renungan_deskripsi=$i['renungan_deskripsi'];
?>
<div id="ModalEdit<?php echo $renungan_id; ?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm">
    <div class="flex max-h-[90vh] w-full max-w-2xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl">
        <form action="<?php echo base_url().'admin/renungan/update_renungan'?>" method="post" enctype="multipart/form-data" class="flex h-full flex-col">
            <div class="flex items-center justify-between bg-primary px-6 py-4 text-white">
                <h4 class="font-headline text-lg tracking-[0.16em]">Edit Renungan</h4>
                <button
                    type="button"
                    onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.add('hidden')"
                    class="text-white/80 transition hover:text-white"
                >
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="space-y-5 overflow-y-auto p-6 font-serif">
                <input type="hidden" name="kode" value="<?php echo $renungan_id; ?>">
                <div>
                    <label class="mb-2 block text-sm font-headline text-primary">Judul Renungan</label>
                    <input
                        type="text"
                        name="xrenungan_judul"
                        value="<?php echo $renungan_judul; ?>"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary"
                        required
                    >
                </div>
                <div>
                    <label class="mb-2 block text-sm font-headline text-primary">Deskripsi</label>
                    <textarea
                        name="xdeskripsi"
                        rows="8"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-secondary focus:ring-1 focus:ring-secondary"
                        required
                    ><?php echo $renungan_deskripsi; ?></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 bg-gray-50 px-6 py-4">
                <button
                    type="button"
                    onclick="document.getElementById('ModalEdit<?php echo $renungan_id; ?>').classList.add('hidden')"
                    class="px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-gray-600 transition hover:text-gray-800"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="rounded-md bg-secondary px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-white shadow-sm transition hover:bg-primary"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<div id="ModalHapus<?php echo $renungan_id; ?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm">
    <div class="w-full max-w-md overflow-hidden rounded-xl bg-white shadow-2xl">
        <form action="<?php echo base_url().'admin/renungan/hapus_renungan'?>" method="post" enctype="multipart/form-data">
            <div class="p-6 text-center font-serif">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-red-600">
                    <span class="material-symbols-outlined text-3xl">warning</span>
                </div>
                <h4 class="font-headline text-xl text-primary">Hapus Renungan?</h4>
                <p class="mt-2 text-gray-600">
                    Apakah Anda yakin ingin menghapus renungan <strong><?php echo $renungan_judul; ?></strong>?
                </p>
                <input type="hidden" name="kode" value="<?php echo $renungan_id; ?>"/>
                <div class="mt-6 flex justify-center gap-3">
                    <button
                        type="button"
                        onclick="document.getElementById('ModalHapus<?php echo $renungan_id; ?>').classList.add('hidden')"
                        class="rounded-md bg-gray-100 px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-gray-700 transition hover:bg-gray-200"
                    >
                        Batal
                    </button>
                    <button
                        type="submit"
                        class="rounded-md bg-red-600 px-6 py-2.5 text-sm font-headline uppercase tracking-[0.2em] text-white shadow-sm transition hover:bg-red-700"
                    >
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>

<?php
$msg = $this->session->flashdata('msg');
if($msg):
    $toastClass = 'bg-green-500';
    $toastIcon = 'check_circle';
    $toastText = 'Tindakan berhasil.';
    if($msg == 'success') {
        $toastText = 'Renungan berhasil disimpan.';
    } elseif($msg == 'success-hapus') {
        $toastClass = 'bg-red-500';
        $toastIcon = 'delete';
        $toastText = 'Renungan berhasil dihapus.';
    } elseif($msg == 'info') {
        $toastClass = 'bg-blue-500';
        $toastIcon = 'info';
        $toastText = 'Renungan berhasil diupdate.';
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 z-[100] flex items-center gap-3 rounded-xl px-6 py-4 font-serif text-white shadow-2xl <?php echo $toastClass; ?>">
    <span class="material-symbols-outlined"><?php echo $toastIcon; ?></span>
    <span><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(function () {
        var toast = document.getElementById('toast-msg');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(function () {
                toast.remove();
            }, 300);
        }
    }, 4000);
</script>
<?php endif; ?>
