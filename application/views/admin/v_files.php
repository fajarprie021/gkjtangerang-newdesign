<section class="bg-cream px-6 py-24 min-h-screen">
  <div class="mx-auto max-w-7xl">
    
    <!-- Admin Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-4">
        <div>
            <?php 
            $this->load->view('components/section_header_left', array(
                'eyebrow' => 'Administrator',
                'title'   => 'Data Download'
            )); 
            ?>
            <p class="text-gray-600 font-serif mt-2">Kelola file yang dapat diunduh oleh publik.</p>
        </div>
        <button onclick="document.getElementById('myModal').classList.remove('hidden')" class="bg-secondary text-white px-6 py-3 rounded-full font-headline tracking-widest text-sm hover:bg-secondary-dark transition-colors shadow-soft whitespace-nowrap">
            + Tambah File
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-soft overflow-hidden border-t-4 border-primary">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-primary/5 text-primary font-headline text-sm tracking-wide border-b border-primary/20">
                        <th class="p-4 w-16">#</th>
                        <th class="p-4">Nama File</th>
                        <th class="p-4 w-40">Tanggal Post</th>
                        <th class="p-4 w-48">Oleh</th>
                        <th class="p-4 w-32 text-center">Diunduh</th>
                        <th class="p-4 w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 font-serif text-sm">
                    <?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $id=$i['file_id'];
                       $judul=$i['file_judul'];
                       $deskripsi=$i['file_deskripsi'];
                       $oleh=$i['file_oleh'];
                       $tanggal=$i['tanggal'];
                       $download=$i['file_download'];
                       $file=$i['file_data'];
                    ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4"><?php echo $no;?></td>
                        <td class="p-4">
                            <a href="<?php echo base_url().'admin/files/download/'.$id;?>" class="font-bold text-primary hover:text-secondary hover:underline line-clamp-2">
                                <?php echo $judul;?>
                            </a>
                            <p class="text-xs text-gray-500 mt-1 line-clamp-1"><?php echo $deskripsi;?></p>
                        </td>
                        <td class="p-4 text-gray-500"><?php echo $tanggal;?></td>
                        <td class="p-4"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-secondary text-[16px]">person</span> <?php echo $oleh;?></span></td>
                        <td class="p-4 text-center">
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold font-headline">
                                <span class="material-symbols-outlined text-[14px]">download</span> <?php echo $download;?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <button onclick="document.getElementById('ModalEdit<?php echo $id;?>').classList.remove('hidden')" class="text-blue-600 hover:text-blue-800 transition-colors" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button onclick="document.getElementById('ModalHapus<?php echo $id;?>').classList.remove('hidden')" class="text-red-600 hover:text-red-800 transition-colors" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                    <?php if($no == 0): ?>
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">Belum ada data file yang diupload.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<!-- Modal Add File -->
<div id="myModal" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/files/simpan_file'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg">Tambah File</h4>
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 space-y-5 font-serif overflow-y-auto">
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Judul File</label>
                    <input type="text" name="xjudul" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Misal: Buletin Minggu Ini" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Deskripsi</label>
                    <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Singkat tentang isi file..." required></textarea>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Oleh (Author)</label>
                    <input type="text" name="xoleh" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" placeholder="Nama pengupload/pembuat" required>
                </div>
                <div class="bg-primary/5 p-4 rounded-lg border border-primary/20">
                    <label class="block text-primary font-headline text-sm mb-2">Upload File</label>
                    <input type="file" name="filefoto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-light transition-all" required>
                    <div class="flex items-center gap-2 text-xs text-gray-600 mt-3 mix-blend-multiply">
                        <span class="material-symbols-outlined text-[16px] text-secondary">info</span>
                        <p>Format wajib: pdf | doc | docx | ppt | pptx | zip. Maksimal: 2.7 MB.</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('myModal').classList.add('hidden')" class="px-6 py-2.5 text-gray-600 hover:text-gray-800 font-headline text-sm uppercase tracking-wider transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-secondary text-white rounded-md hover:bg-secondary-dark font-headline text-sm uppercase tracking-wider shadow-sm transition-colors">Simpan File</button>
            </div>
        </form>
    </div>
</div>

<!-- Modals Edit & Hapus -->
<?php foreach ($data->result_array() as $i) :
    $id=$i['file_id'];
    $judul=$i['file_judul'];
    $deskripsi=$i['file_deskripsi'];
    $oleh=$i['file_oleh'];
    $file=$i['file_data'];
?>
<!-- Modal Edit: <?php echo $judul; ?> -->
<div id="ModalEdit<?php echo $id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
        <form action="<?php echo base_url().'admin/files/update_file'?>" method="post" enctype="multipart/form-data" class="flex flex-col h-full">
            <div class="bg-primary px-6 py-4 flex justify-between items-center text-white shrink-0">
                <h4 class="font-headline tracking-widest text-lg">Edit File</h4>
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $id;?>').classList.add('hidden')" class="text-white/80 hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6 space-y-5 font-serif overflow-y-auto">
                <input type="hidden" name="kode" value="<?php echo $id;?>">
                <input type="hidden" name="file" value="<?php echo $file;?>">
                
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Judul File</label>
                    <input type="text" name="xjudul" value="<?php echo $judul;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Deskripsi</label>
                    <textarea name="xdeskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required><?php echo $deskripsi;?></textarea>
                </div>
                <div>
                    <label class="block text-primary font-headline text-sm mb-2">Oleh (Author)</label>
                    <input type="text" name="xoleh" value="<?php echo $oleh;?>" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:border-secondary focus:ring-1 focus:ring-secondary outline-none transition-all" required>
                </div>
                <div class="bg-primary/5 p-4 rounded-lg border border-primary/20">
                    <label class="block text-primary font-headline text-sm mb-2">Update File (Opsional)</label>
                    <input type="file" name="filefoto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-light transition-all">
                    <div class="flex items-center gap-2 text-xs text-gray-600 mt-3 mix-blend-multiply">
                        <span class="material-symbols-outlined text-[16px] text-secondary">info</span>
                        <p>Kosongkan jika tidak ingin mengubah file saat ini (<?php echo $file;?>).<br>Format wajib: pdf | doc | docx | ppt | pptx | zip. Maksimal: 2.7 MB.</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100 shrink-0">
                <button type="button" onclick="document.getElementById('ModalEdit<?php echo $id;?>').classList.add('hidden')" class="px-6 py-2.5 text-gray-600 hover:text-gray-800 font-headline text-sm uppercase tracking-wider transition-colors">Batal</button>
                <button type="submit" class="px-6 py-2.5 bg-secondary text-white rounded-md hover:bg-secondary-dark font-headline text-sm uppercase tracking-wider shadow-sm transition-colors">Update File</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Hapus: <?php echo $judul; ?> -->
<div id="ModalHapus<?php echo $id;?>" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-opacity">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden">
        <form action="<?php echo base_url().'admin/files/hapus_file'?>" method="post">
            <div class="p-6 text-center font-serif">
                <div class="w-16 h-16 mx-auto bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">warning</span>
                </div>
                <h4 class="font-headline text-xl text-primary mb-2">Hapus File?</h4>
                <p class="text-gray-600 mb-6">Apakah Anda yakin mau menghapus file <strong><?php echo $judul;?></strong>? Tindakan ini tidak dapat dibatalkan dan file fisik akan ikut terhapus.</p>
                
                <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                <input type="hidden" name="file" value="<?php echo $file;?>">
                
                <div class="flex justify-center gap-3">
                    <button type="button" onclick="document.getElementById('ModalHapus<?php echo $id;?>').classList.add('hidden')" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 font-headline tracking-wider text-sm transition-colors">Batal</button>
                    <button type="submit" class="px-6 py-2.5 bg-red-600 text-white rounded-md hover:bg-red-700 font-headline tracking-wider text-sm shadow-sm transition-colors">Ya, Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endforeach;?>

<!-- Notifications / Toasts -->
<?php 
$msg = $this->session->flashdata('msg');
$allowed_msgs = array('success', 'info', 'success-hapus', 'warning', 'error');
if (in_array($msg, $allowed_msgs, true)): 
    $toastClass = "bg-green-500";
    $toastIcon = "check_circle";
    $toastText = "Tindakan berhasil.";
    
    if($msg == 'success') {
        $toastText = "File berhasil disimpan ke database.";
    } elseif($msg == 'success-hapus') {
        $toastText = "File berhasil dihapus dari sistem.";
    } elseif($msg == 'info') {
        $toastClass = "bg-blue-500";
        $toastIcon = "info";
        $toastText = "Data file berhasil diupdate.";
    } elseif($msg == 'warning' || $msg == 'error') {
        $toastClass = "bg-red-500";
        $toastIcon = "error";
        $toastText = "Terjadi kesalahan. Pastikan ukuran & format file benar.";
    }
?>
<div id="toast-msg" class="fixed bottom-6 right-6 <?php echo $toastClass; ?> text-white px-6 py-4 rounded-xl shadow-2xl font-serif z-[100] flex items-center gap-3 transition-opacity duration-300">
    <span class="material-symbols-outlined"><?php echo $toastIcon; ?></span>
    <span><?php echo $toastText; ?></span>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-msg');
        if(toast) {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
</script>
<?php endif; ?>

<?php /* 
================================================================================
LEGACY ADMINLTE REFERENCES (REMARKED FOR SAFETY & DEPENDENCIES CHECK)
================================================================================

--- LEGACY CSS ---
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
<!-- AdminLTE Skins -->
<link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
<!-- Toast -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

--- LEGACY JS & SCRIPTS ---
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>
*/ ?>
