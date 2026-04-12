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
  <title>M-Sekolah | List Berita</title>
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

	<?php
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

    ?>

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
        List Visi & Misi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Berita</a></li>
        <li class="active">List Berita</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <!-- <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/sejarah/add_sejarah'?>"><span class="fa fa-plus"></span> Post Tulisan</a> -->
              <a id="myButton" class="btn btn-success btn-flat" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Post Tulisan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
      					<th>Gambar</th>
      					<th>Judul</th>
      					<th>Tanggal</th>
      					<th>Author</th>
      					<th>Baca</th>
                    <th>Kategori</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
          					// $no=0;
          					// foreach ($data->result_array() as $i) :
          					//    $no++;
          					//    $tulisan_id=$i['tulisan_id'];
          					//    $tulisan_judul=$i['tulisan_judul'];
          					//    $tulisan_isi=$i['tulisan_isi'];
          					//    $tulisan_tanggal=$i['tanggal'];
          					//    $tulisan_author=$i['tulisan_author'];
          					//    $tulisan_gambar=$i['tulisan_gambar'];
          					//    $tulisan_views=$i['tulisan_views'];
                    //    $kategori_id=$i['tulisan_kategori_id'];
                    //    $kategori_nama=$i['tulisan_kategori_nama'];

                    $no=0;
                    foreach ($datatentang as $i) :
                      $no++;
                      $tulisan_id=$i->tulisan_id;
                      $tulisan_judul=$i->tulisan_judul;
                      $tulisan_isi=$i->tulisan_isi;
                      $tulisan_tanggal=$i->tanggal;
                      $tulisan_author=$i->tulisan_author;
                      $tulisan_gambar=$i->tulisan_gambar;
                      $tulisan_views=$i->tulisan_views;
                      $kategori_id=$i->tulisan_kategori_id;
                      $kategori_nama=$i->tulisan_kategori_nama;

                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'assets/images/'.$tulisan_gambar;?>" style="width:90px;"></td>
                  <td><?php echo $tulisan_judul;?></td>

        				  <td><?php echo $tulisan_tanggal;?></td>
        				  <td><?php echo $tulisan_author;?></td>
        				  <td><?php echo $tulisan_views;?></td>
        				  <td><?php echo $kategori_nama;?></td>
                  <td style="text-align:right;">
                        <!-- <a class="btn" href="<?php echo base_url().'admin/sejarah/get_edit/'.$tulisan_id;?>"><span class="fa fa-pencil"></span></a> -->
                        <!-- <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $tulisan_id;?>"><span class="fa fa-pencil"></span></a> -->
                        <button class="btn btn-primary edit-btn" data-id="<?php echo $i->tulisan_id; ?>" data-title="<?php echo $i->tulisan_judul; ?>" data-description="<?php echo $i->tulisan_isi; ?>" data-categori-id="<?php echo $i->tulisan_kategori_id; ?>" data-categori-name="<?php echo $i->tulisan_kategori_nama; ?>">Edit</button>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $tulisan_id;?>"><span class="fa fa-trash"></span></a>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



	<?php foreach ($data->result_array() as $i) :
              $tulisan_id=$i['tulisan_id'];
              $tulisan_judul=$i['tulisan_judul'];
              $tulisan_gambar=$i['tulisan_gambar'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $tulisan_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/visimisi/hapus_visimisi'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $tulisan_id;?>"/>
                     <input type="hidden" value="<?php echo $tulisan_gambar;?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $tulisan_judul;?></b> ?</p>

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

  <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Add Visi & Misi</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/visimisi/simpan_visimisi'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control select2" name="xkategori" style="width: 100%;" required>
                <option value="">-Pilih-</option>
                <?php
                $no=0;
                foreach ($kat->result_array() as $i) :
                  $no++;
                  $kategori_id=$i['kategori_id'];
                  $kategori_nama=$i['kategori_nama'];
                  ?>
                  <option value="<?php echo $kategori_id;?>"><?php echo $kategori_nama;?></option>
                  <?php endforeach;?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Berita</label>
            <div class="col-sm-7">
              <textarea id="ckeditorAdd" name="xisi" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
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

<?php foreach ($data->result_array() as $i) :
    $tulisan_id=$i['tulisan_id'];
    $tulisan_judul=$i['tulisan_judul'];
    $tulisan_gambar=$i['tulisan_gambar'];
    $tulisan_kategori_id=$i['tulisan_kategori_id'];
    $tulisan_isi=$i['tulisan_isi'];
?>
<div class="modal fade" id="ModalEdit<?php echo $tulisan_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Update Sejarah</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/visimisi/update_visimisi'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="kode" value="<?php echo $tulisan_id;?>"/>
          <input type="hidden" value="<?php echo $tulisan_gambar;?>" name="gambar">
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" name="xjudul" class="form-control" value="<?php echo $tulisan_judul;?>" id="inputUserName" placeholder="Judul" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control select2" name="xkategori" style="width: 100%;" required>
                <option value="">-Pilih-</option>
                <?php
                foreach ($kat->result_array() as $i) {
                  $kategori_id=$i['kategori_id'];
                  $kategori_nama=$i['kategori_nama'];
                  if($tulisan_kategori_id==$kategori_id)
                    echo "<option value='$kategori_id' selected>$kategori_nama</option>";
                  else
                    echo "<option value='$kategori_id'>$kategori_nama</option>";
                }?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Berita</label>
            <div class="col-sm-7">
              <textarea id="ckeditor" name="xisi" required><?php echo $tulisan_isi;?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
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

<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Text</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="form-group">
                        <label for="edit-title">Judul</label>
                        <input type="text" id="edit-title" name="title" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label for="edit-categori_name">Kategori</label>
                        <select class="form-control" id="edit-category_id"  name="category_id">
                          <option value="">-Pilih-</option>
                          <?php
                          foreach ($kat->result_array() as $i) {
                            $kategori_id=$i['kategori_id'];
                            $kategori_nama=$i['kategori_nama'];
                            if($tulisan_kategori_id==$kategori_id)
                              echo "<option value='$kategori_id' selected>$kategori_nama</option>";
                            else
                              echo "<option value='$kategori_id'>$kategori_nama</option>";
                          }?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="edit-categori_name">Kategori</label>
                        <select class="form-control" id="edit-category_id"  name="category_id" required>
                          <option value="">-Pilih-</option>
                          <?php foreach ($x['kat2'] as $kategori) : ?>
                              <option value="<?php echo $kategori['kategori_id']; ?>" <?php echo ($kategori['kategori_id'] == $x['selected_category_id']) ? 'selected' : ''; ?>>
                                  <?php echo $kategori['kategori_nama']; ?>
                              </option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Description</label>
                        <textarea id="edit-description" name="description" class="form-control"></textarea>
                    </div>
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
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
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditor');


  });
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

    CKEDITOR.replace('ckeditorAdd');


  });
</script>
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            // var tulisan_id = $(this).data('tulisan_id');
            // var tulisan_judul = $(this).data('tulisan_judul');
            // var tulisan_isi = $(this).data('tulisan_isi');
            var category_id = $(this).data('category_id');
            var category_name = $(this).data('category_name');

            // $('#edit-id').val(id);
            // $('#edit-title').val(title);
            // // $('#edit-id').val(tulisan_id);
            // // $('#edit-title').val(tulisan_judul);
            // CKEDITOR.instances['edit-description'].setData(description);
            // // CKEDITOR.instances['edit-description'].setData(tulisan_isi);
            // $('#edit-category_id').val(category_id);
            // // $('#edit-category_name').val(category_name);

            // Mengambil category_name berdasarkan category_id
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/visimisi/get_category_name'); ?>',
                data: { category_id: category_id },
                success: function(response) {
                    $('#edit-id').val(id);
                    $('#edit-title').val(title);
                    CKEDITOR.instances['edit-description'].setData(description);
                    $('#edit-category_id').val(category_id);
                    $('#edit-category_name').val(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            $('#editModal').modal('show');
        });
    });

    // Inisialisasi CKEditor
    CKEDITOR.replace('edit-description');
</script>
<script>
    $('#editForm').on('submit', function(e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        $.ajax({
            // url: 'your_controller/update', // Ganti dengan URL update yang sesuai
            url: '<?php echo base_url('admin/visimisi/update'); ?>', // Ganti dengan URL update yang sesuai
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Lakukan sesuatu setelah berhasil disimpan
                $('#editModal').modal('hide');
                location.reload(); // Muat ulang halaman untuk melihat perubahan
            },
            error: function(response) {
                // Tangani kesalahan
                console.log(response);
            }
        });
    });
</script>
<style>
    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var link = document.getElementById('myButton');
      <?php if ($data->num_rows() > 0): ?>
        link.classList.add('disabled');
      <?php else: ?>
        link.classList.remove('disabled');
      <?php endif; ?>
    });
</script>
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
  });
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
                    text: "Berita Berhasil disimpan ke database.",
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
                    text: "Berita berhasil di update",
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
                    text: "Berita Berhasil dihapus.",
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
