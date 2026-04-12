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
  <title>Add Post</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">


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
        Berita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">Add Berita</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Post Galeri</h3>
        </div>

		<div class="box-body">
          <div class="row">
            <div class="col-md-10">
              <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul galeri" required/>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <button type="submit" id="upload" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                <div id="console"></div>
            </div>
          </div>
        </div>

      </div>
	  </div>

      <div class="row">
        <!-- <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Berita</h3>
            </div>
            <div class="box-body">

			<textarea id="ckeditor" name="xisi" required></textarea>

            </div>
          </div>

        </div> -->
        
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pengaturan Lainnya</h3>
            </div>
            <div class="box-body">

              <!-- <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;" required>
                  <option value="">-Pilih-</option>
				  <?php
					$no=0;
					foreach ($alb->result_array() as $i) :
					   $no++;
                       $album_id=$i['album_id'];
                       $album_nama=$i['album_nama'];

                    ?>
                  <option value="<?php echo $album_id;?>"><?php echo $album_nama;?></option>
				  <?php endforeach;?>
                </select>
              </div> -->

			  <div class="form-group">
                <label>Gambar</label>
                <!-- <input type="file" name="filefoto" style="width: 100%;" required> -->
                <input type="file" id="uploadFile" accept="image/*">
                <canvas id="canvas" style="display:none;"></canvas>
              </div>
			 <div class="form-group">

            </div>
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script src="<?=base_url();?>public/js/plupload/plupload.full.min.js"></script>
<!-- <script type="text/javascript" src="<?=base_url();?>public/js/application.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/pica@8.0.0/dist/pica.min.js"></script>
<!-- Page script -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>
<script>
    let uploadBtn = document.getElementById('upload');
    let fileInput = document.getElementById('uploadFile');
    let canvas = document.getElementById('canvas');
    let ctx = canvas.getContext('2d');
    let pica = window.pica();

    uploadBtn.addEventListener('click', function () {
        let file = fileInput.files[0];
        if (!file) return alert('Pilih gambar terlebih dahulu!');

        let img = new Image();
        img.src = URL.createObjectURL(file);

        img.onload = function () {
            // Set ukuran canvas sesuai ukuran yang diinginkan
            let newWidth = 800;
            let newHeight = img.height * (newWidth / img.width); // Maintain aspect ratio
            canvas.width = newWidth;
            canvas.height = newHeight;

            ctx.drawImage(img, 0, 0, newWidth, newHeight);

            pica.resize(img, canvas, {
                quality: 3,
            }).then(result => {
                return pica.toBlob(result, 'image/jpeg', 0.8); // Convert canvas to Blob
            }).then(blob => {
                let formData = new FormData();
                formData.append('file', blob, file.name);
                formData.append('judul', document.getElementById('judul').value);
                // formData.append('kategori', document.getElementById('kategori').value);

                // Upload the resized image to the server
                fetch('<?= base_url("admin/slide/uploadtoserver") ?>', {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    return response.json();
                }).then(result => {
                    console.log('Success:', result);

                    // Check if upload and resize is successful
                    if (result.status === 'success') {
                        alert(result.message); // Show success message
                        // location.reload(); // Refresh page after success
                        window.location.href = '<?= base_url("admin/slide"); ?>'; // Redirect ke halaman admin/galeri
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            });
        };
    });
</script>
</body>
</html>
