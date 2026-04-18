<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Data Pengguna'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2 text-sm max-w-xl">Kelola akun administrator dan penulis website GKJ Tangerang.</p>
        </div>
        <button onclick="document.getElementById('myModal').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-primary transition-colors shadow-soft whitespace-nowrap">
            + Tambah Pengguna
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1000px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-20 text-center">Photo</th>
                        <th class="p-4">Nama & Username</th>
                        <th class="p-4">Email & Kontak</th>
                        <th class="p-4 w-32">Jenis Kelamin</th>
                        <th class="p-4 w-32">Level</th>
                        <th class="p-4 w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php foreach ($data->result_array() as $i) :
                       $pengguna_id=$i['pengguna_id'];
                       $pengguna_nama=$i['pengguna_nama'];
                       $pengguna_jenkel=$i['pengguna_jenkel'];
                       $pengguna_email=$i['pengguna_email'];
                       $pengguna_username=$i['pengguna_username'];
                       $pengguna_nohp=$i['pengguna_nohp'];
                       $pengguna_level=$i['pengguna_level'];
                       $pengguna_photo=$i['pengguna_photo'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 flex justify-center">
                            <img class="w-12 h-12 rounded-full object-cover border-2 border-primary/10 shadow-sm" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>" alt="User Photo">
                        </td>
                        <td class="p-4">
                            <span class="font-bold text-primary block leading-tight"><?php echo $pengguna_nama;?></span>
                            <span class="text-xs text-gray-500 font-sans tracking-wider uppercase">@<?php echo $pengguna_username;?></span>
                        </td>
                        <td class="p-4">
                            <span class="block text-gray-600 leading-relaxed"><?php echo $pengguna_email;?></span>
                            <span class="text-xs text-secondary font-sans"><?php echo $pengguna_nohp;?></span>
                        </td>
                        <td class="p-4 italic">
                            <?php echo ($pengguna_jenkel=='L') ? 'Laki-Laki' : 'Perempuan';?>
                        </td>
                        <td class="p-4">
                            <?php if($pengguna_level=='1'):?>
                                <span class="bg-red-50 text-red-700 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border border-red-100">Administrator</span>
                            <?php else:?>
                                <span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border border-blue-100">Author</span>
                            <?php endif;?>
                        </td>
                        <td class="p-4 text-right space-x-1.5 whitespace-nowrap">
                            <button onclick="document.getElementById('ModalEdit<?php echo $pengguna_id;?>').classList.remove('hidden')" class="text-indigo-600 hover:text-indigo-800 transition-colors bg-indigo-50 p-2 rounded-md" title="Edit">
                                <span class="material-symbols-outlined text-sm">edit</span>
                            </button>
                            <a href="<?php echo base_url().'admin/pengguna/reset_password/'.$pengguna_id;?>" class="inline-block text-amber-600 hover:text-amber-800 transition-colors bg-amber-50 p-2 rounded-md" title="Reset Password">
                                <span class="material-symbols-outlined text-sm">refresh</span>
                            </a>
                            <button onclick="document.getElementById('ModalHapus<?php echo $pengguna_id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors bg-red-50 p-2 rounded-md" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg uppercase">Tambah Pengguna Baru</h4>
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 font-serif overflow-y-auto grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="xnama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="xemail" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="xusername" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Level <span class="text-red-500">*</span></label>
                    <select name="xlevel" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                        <option value="1">Administrator</option>
                        <option value="2">Author</option>
                    </select>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="xpassword" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" name="xpassword2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex gap-4 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="L" name="xjenkel" checked class="text-secondary focus:ring-secondary"> Laki-Laki
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="P" name="xjenkel" class="text-secondary focus:ring-secondary"> Perempuan
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Kontak / HP <span class="text-red-500">*</span></label>
                    <input type="text" name="xkontak" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required placeholder="08xxxx">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Photo <span class="text-red-500">*</span></label>
                    <input type="file" name="filefoto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-headline file:bg-primary/5 file:text-primary hover:file:bg-primary/10" required>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-colors">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php foreach ($data->result_array() as $i) :
    $pengguna_id=$i['pengguna_id'];
    $pengguna_nama=$i['pengguna_nama'];
    $pengguna_jenkel=$i['pengguna_jenkel'];
    $pengguna_email=$i['pengguna_email'];
    $pengguna_username=$i['pengguna_username'];
    $pengguna_nohp=$i['pengguna_nohp'];
    $pengguna_level=$i['pengguna_level'];
?>
<!-- Modal Edit: <?php echo $pengguna_nama; ?> -->
<div id="ModalEdit<?php echo $pengguna_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg uppercase">Edit Pengguna</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $pengguna_id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 font-serif overflow-y-auto grid grid-cols-1 md:grid-cols-2 gap-5">
                <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="xnama" value="<?php echo $pengguna_nama;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="xemail" value="<?php echo $pengguna_email;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="xusername" value="<?php echo $pengguna_username;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Level <span class="text-red-500">*</span></label>
                    <select name="xlevel" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                        <option value="1" <?php echo ($pengguna_level=='1')?'selected':'';?>>Administrator</option>
                        <option value="2" <?php echo ($pengguna_level=='2')?'selected':'';?>>Author</option>
                    </select>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Password (Kosongkan jika tidak berubah)</label>
                    <input type="password" name="xpassword" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Konfirmasi Password</label>
                    <input type="password" name="xpassword2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex gap-4 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="L" name="xjenkel" <?php echo ($pengguna_jenkel=='L')?'checked':'';?> class="text-secondary focus:ring-secondary"> Laki-Laki
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" value="P" name="xjenkel" <?php echo ($pengguna_jenkel=='P')?'checked':'';?> class="text-secondary focus:ring-secondary"> Perempuan
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Kontak / HP <span class="text-red-500">*</span></label>
                    <input type="text" name="xkontak" value="<?php echo $pengguna_nohp;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-primary font-headline text-sm mb-2 uppercase tracking-wider">Photo (Kosongkan jika tidak ganti)</label>
                    <input type="file" name="filefoto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-headline file:bg-primary/5 file:text-primary hover:file:bg-primary/10">
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $pengguna_id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-500 hover:text-gray-700 font-headline text-xs uppercase tracking-widest transition-colors">Batal</button>
                <button type="submit" class="px-8 py-3 bg-secondary text-white rounded-md hover:bg-primary font-headline text-xs uppercase tracking-widest shadow-sm transition-colors">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus -->
<div id="ModalHapus<?php echo $pengguna_id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-sm overflow-hidden p-8 text-center font-serif">
        <form action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" method="post">
            <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <h4 class="font-headline text-xl text-primary mb-2 uppercase tracking-wider">Hapus Pengguna?</h4>
            <p class="text-gray-600 text-sm mb-8 px-4 font-serif leading-relaxed">Apakah Anda yakin mau menghapus Pengguna <strong><?php echo $pengguna_nama;?></strong>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
            
            <div class="flex justify-center gap-3">
                <button type="button" onclick="document.getElementById('ModalHapus<?php echo $pengguna_id;?>').classList.add('hidden')" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200 font-headline tracking-widest text-xs uppercase transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-widest text-xs uppercase shadow-sm transition-colors">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Trigger Reset Password Modal -->
<?php if($this->session->flashdata('msg')=='show-modal'):?>
<div id="ModalResetPassword" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/70 backdrop-blur-sm p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden p-8 font-serif">
        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-3xl">lock_reset</span>
            </div>
            <h4 class="font-headline text-xl text-primary uppercase tracking-wider">Password Direset</h4>
            <p class="text-gray-500 text-sm mt-1">Harap catat kredensial baru di bawah ini.</p>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-5 space-y-3 border border-gray-100 mb-6 font-mono text-sm">
            <div class="flex justify-between border-b border-gray-200 pb-2">
                <span class="text-gray-400">Username</span>
                <span class="font-bold text-primary"><?php echo $this->session->flashdata('uname');?></span>
            </div>
            <div class="flex justify-between pt-1">
                <span class="text-gray-400">Password Baru</span>
                <span class="font-bold text-secondary text-base"><?php echo $this->session->flashdata('upass');?></span>
            </div>
        </div>
        
        <button onclick="document.getElementById('ModalResetPassword').remove()" class="w-full py-3 bg-primary text-white rounded-md font-headline tracking-widest uppercase text-xs hover:bg-ink transition shadow-soft">Tutup</button>
    </div>
</div>
<?php endif;?>

<!-- Toasts -->
<?php 
$msg = $this->session->flashdata('msg');
if($msg && $msg != 'show-modal'): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Berhasil!";
    
    if($msg == 'success') {
        $toastText = "Pengguna berhasil disimpan.";
    } elseif($msg == 'info') {
        $toastText = "Pengguna berhasil diupdate.";
    } elseif($msg == 'success-hapus') {
        $toastClass = "bg-red-600";
        $toastIcon = "delete_sweep";
        $toastText = "Pengguna berhasil dihapus.";
    } elseif($msg == 'error') {
        $toastClass = "bg-red-500";
        $toastIcon = "error";
        $toastText = "Password konfirmasi tidak sama.";
    } elseif($msg == 'warning') {
        $toastClass = "bg-amber-500";
        $toastIcon = "warning";
        $toastText = "Upload gambar gagal atau limit.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
    <span class="material-symbols-outlined text-2xl"><?php echo $toastIcon; ?></span>
    <span class="text-sm font-bold uppercase tracking-widest"><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 300); }
    }, 4000);
</script>
<?php endif; ?>
