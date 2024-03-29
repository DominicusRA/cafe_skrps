<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stok || Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="notifications-menu">
            <a href="<?php echo base_url() ?>index.php/login_controler/log_out">
              <i class="fa fa-power-off"></i>
              Log Out
            </a>
          </li>
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
      

      <!-- Messages Dropdown Menu -->
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Cafe</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/dashboard_controler" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/resep_controler" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resep / Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/bahan_controler" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/karyawan_controler" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master
              </p>
            </a>
          </li> -->
          
          <li class="nav-item">
            <a href="<?php echo base_url() ?>index.php/stok_controler" class="nav-link active">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Stok
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li> -->


          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/transaksi_controler" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/stok_masuk_controler" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Masuk</p>
                </a>
              </li> -->
            </ul>
          </li>



          <li class="nav-item">
            <a href="<?php echo base_url() ?>index.php/report_controler" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Report
              </p>
            </a>
          </li>
          
          
          
          
          
          <!-- <li class="nav-header">EXAMPLES</li>
          <li class="nav-header">MISCELLANEOUS</li>
          
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          
          <li class="nav-header">LABELS</li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div> -->
          <!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active">Stok</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Stok Bahan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-data-bahan">
                    <i class="fa fa-plus"></i>
                    Stok Masuk
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode bahan</th>
                    <th>Bahan</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>keterangan</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=0;
                    foreach($bahan->result_array() as $data_bahan):
                      $nomor++;
                      if($data_bahan['jumlah']<=$data_bahan['limit']){
                        $color_bg='table-danger';
                        $keterangan='<b>Persediaan habis';
                      }else{
                        $color_bg='table-default';
                        $keterangan='-';
                      }
                  ?>

                    <tr class="<?=$color_bg?>">
                      <td><?=$nomor?></td>
                      <td><?=$data_bahan['kode_bahan']?></td>
                      <td><?=$data_bahan['nama_bahan']?></td>
                      <td><?=$data_bahan['jumlah']?></td>
                      <td><?=$data_bahan['satuan']?></td>
                      <td><?=$keterangan?></td>
                      <td>
                        <!-- jika ada stok, button delete tidak muncul -->
                        <a href="<?php echo base_url() ?>index.php/stok_controler/detail/<?=$data_bahan['id_bahan']?>">
                          <button type="button" class="btn btn-primary">
                            <i class="fa fa-eye"></i> Detail
                          </button>
                        </a>
                      </td>
                    </tr>

                  <?php
                    endforeach  
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <div class="modal fade" id="modal-data-bahan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Masukan Data Stok</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url() ?>index.php/stok_controler/add_stok" method="post">
              <div class="modal-body">
                
                <div class="row">
                  <div class="container">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          
                          <div class="col-3">
                            <label for="bahan">Tanggal Stok Masuk</label>
                            <input type="date" class="form-control datetimepicker-input" id="tanggal" name="tanggal" >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="container">
                    <div class="card">
                      <div class="card-header">
                        Detail Barang Masuk
                      </div>
                      <div class="card-body">
                        <table class="table table-borderless" id="stok" >
                          <tr>
                            <td>
                              <label for="bahan">Nama Bahan</label>
                            </td>
                            <td>
                              <label for="bahan">Jumlah</label>
                            </td>
                            <td>
                              <label for="bahan">Satuan</label>
                            </td>
                          </tr>
                          <tr>
                            <td id="bahan_col">
                              
                              <select name="select_bahan[]" id="select_bahan[]" class="form-control select2" style="width: 100%;">
                                <option selected="selected"></option>
                                <?php
                                  foreach($bahan->result_array() as $data_bahan):
                                ?>
                                <option value="<?=$data_bahan['id_bahan']?>"><?=$data_bahan['nama_bahan']?></option>
                                <?php
                                  endforeach
                                ?>
                              </select>
                            </td>
                            <td id="jumlah_col">
                              <input type="number" min="1" id="jumlah[]" name="jumlah[]" value=""class="form-control form-control-sm" >
                            </td>
                            <td>
                              <div class="satuan">Gr</div>
                            </td>
                          </tr>
                          
                        </table>
                        <div class="row">
                          <div class="col-sm">
                            <div class="container">
                              <!-- button -->
                              <button id="add" type="button" class="btn btn-primary" ><i class="fa fa-plus"></i></button>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>




              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div> -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard3.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- new add on custom js -->
<script src="<?php echo base_url() ?>assets/dist/js/stok/stok.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "searching": false, 
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
  $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
</body>
</html>
