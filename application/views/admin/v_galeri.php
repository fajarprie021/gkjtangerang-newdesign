<!--Counter Inbox-->
<?php
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $jum_comment=$query2->num_rows();
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GKJ Tangerang | Gallery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pica/8.0.0/pica.min.js"></script> -->



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php
    $this->load->view('admin/v_header');
  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery Photos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Photos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <!-- <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Photo</a> -->
              <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/galeri/add_galeri'?>"><span class="fa fa-plus"></span> Add Photo</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
          					<th>Gambar</th>
          					<th>Judul</th>
          					<th>Tanggal</th>
          					<th>Album</th>
          					<th>Author</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
          					   $galeri_id=$i['galeri_id'];
          					   $galeri_judul=$i['galeri_judul'];
          					   $galeri_tanggal=$i['tanggal'];
          					   $galeri_author=$i['galeri_author'];
          					   $galeri_gambar=$i['galeri_gambar'];
          					   $galeri_album_id=$i['galeri_album_id'];
                       $galeri_album_nama=$i['album_nama'];

                    ?>
                <tr>
                  <!-- <td><img src="<?php echo base_url().'assets/images/'.$galeri_gambar;?>" style="width:80px;"></td> -->
                  <td><img src="<?php echo base_url().'assets/images/galeri/'.$galeri_gambar;?>" style="width:80px;"></td>
                  <td><?php echo $galeri_judul;?></td>
        				  <td><?php echo $galeri_tanggal;?></td>
        				  <td><?php echo $galeri_album_nama;?></td>
                  <td><?php echo $galeri_author;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $galeri_id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $galeri_id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://mfikri.com">M Fikri Setiadi</a>.</strong> All rights reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Modal Tambah Galeri -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><span class="fa fa-close"></span></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
            </div>
            <form class="form-horizontal" id="form_add_gallery" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="galeri_judul" class="col-sm-4 control-label">Judul</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="galeri_judul" placeholder="Judul" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="galeri_album_id" class="col-sm-4 control-label">Album</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="galeri_album_id" required>
                                <option value="">-Pilih-</option>
                                <?php foreach ($alb->result_array() as $a): ?>
                                    <option value="<?php echo $a['album_id']; ?>"><?php echo $a['album_nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="galeri_gambar" class="col-sm-4 control-label">Photo</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" id="fileInput" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

  <!--Modal Edit Album-->
  <?php foreach ($data->result_array() as $i) :
              $galeri_id=$i['galeri_id'];
              $galeri_judul=$i['galeri_judul'];
              $galeri_tanggal=$i['tanggal'];
              $galeri_author=$i['galeri_author'];
              $galeri_gambar=$i['galeri_gambar'];
              $galeri_album_id=$i['galeri_album_id'];
              $galeri_album_nama=$i['album_nama'];
            ?>

        <div class="modal fade" id="ModalEdit<?php echo $galeri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Photo</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/galeri/update_galeri'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
                                <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">
                                  <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xjudul" class="form-control" value="<?php echo $galeri_judul;?>" id="inputUserName" placeholder="Judul" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Album</label>
                                        <div class="col-sm-7">

                                          <select class="form-control" name="xalbum" style="width: 100%;" required>
                                                    <option value="">-Pilih-</option>
                                              <?php
                                              foreach ($alb->result_array() as $a) {
                                                           $alb_id=$a['album_id'];
                                                           $alb_nama=$a['album_nama'];
                                                           if($galeri_album_id==$alb_id)
                                                              echo "<option value='$alb_id' selected>$alb_nama</option>";
                                                           else
                                                              echo "<option value='$alb_id'>$alb_nama</option>";
                                                        }?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
	<!--Modal Edit Album-->

	<?php foreach ($data->result_array() as $i) :
              $galeri_id=$i['galeri_id'];
              $galeri_judul=$i['galeri_judul'];
              $galeri_tanggal=$i['tanggal'];
              $galeri_author=$i['galeri_author'];
              $galeri_gambar=$i['galeri_gambar'];
              $galeri_album_id=$i['galeri_album_id'];
              $galeri_album_nama=$i['album_nama'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $galeri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Photo</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/galeri/hapus_galeri'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $galeri_id;?>"/>
                     <input type="hidden" value="<?php echo $galeri_gambar;?>" name="gambar">
                     <input type="hidden" value="<?php echo $galeri_album_id;?>" name="album">
                            <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $galeri_judul;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>




<!-- jQuery 2.2.3 -->
<!-- <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery untuk AJAX -->
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<script src="<?=base_url();?>public/js/plupload/plupload.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>
<!-- page script -->
<script>
    const pica = Pica();
    const chunkSize = 1 * 1024 * 1024; // Ukuran chunk 1MB

    $('#form_add_gallery').on('submit', function(e) {
        e.preventDefault();
        let fileInput = document.getElementById('fileInput');
        let file = fileInput.files[0];
        let canvas = document.createElement('canvas');
        let img = new Image();
        let reader = new FileReader();

        reader.onload = function(event) {
            img.src = event.target.result;
            img.onload = function() {
                let width = 800;
                let height = Math.floor((img.height / img.width) * 800);
                canvas.width = width;
                canvas.height = height;

                pica.resize(img, canvas).then(result => {
                    return pica.toBlob(result, 'image/jpeg', 0.9);
                }).then(resizedBlob => {
                    uploadInChunks(resizedBlob);
                });
            };
        };
        reader.readAsDataURL(file);
    });

    function uploadInChunks(blob) {
        let totalChunks = Math.ceil(blob.size / chunkSize);
        let currentChunk = 0;
        let fileName = `foto_custom_${Date.now()}.jpg`;

        function uploadNextChunk(start) {
            let chunk = blob.slice(start, start + chunkSize);
            let formData = new FormData();
            formData.append('file', chunk);
            formData.append('name', fileName);
            formData.append('chunk', currentChunk);
            formData.append('chunks', totalChunks);
            formData.append('galeri_judul', $('input[name="galeri_judul"]').val());
            formData.append('galeri_album_id', $('select[name="galeri_album_id"]').val());

            $.ajax({
                url: "<?= base_url('admin/galeri/uploadtoserver') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    currentChunk++;
                    if (currentChunk < totalChunks) {
                        uploadNextChunk(currentChunk * chunkSize);
                    } else {
                        alert('Upload selesai!');
                        $('#myModal').modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Upload gagal: ' + error);
                }
            });
        }

        uploadNextChunk(0); // Mulai upload chunk pertama
    }
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Photo Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Photo berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Photo Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
