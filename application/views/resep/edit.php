<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resep || Admin</title>

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

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>index.php/resep_controler" class="nav-link active">
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
            <a href="<?php echo base_url() ?>index.php/stok_controler" class="nav-link">
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
        <?php
          foreach($resep->result_array() as $data_resep){
            $menu=$data_resep['nama'];
            $kode_menu=$data_resep['kode_menu'];
          }
        ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/resep_controler">Resep & Menu</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                
                <h3 class="card-title">Tabel Detail Resep</h3>
                <div class="card-tools">
                 
                </div>
              </div>
              <div class="card-body">
                <form id="form_resep" action="<?php echo base_url() ?>index.php/resep_controler/edit_data" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="card-tools">
                            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-data-bahan">
                                <i class="fa fa-save"></i>
                                Simpan Perubahan
                              </button>
                          </div>
                        </div>
                        <div class="card-body">
                        <input type="text" name="id_menu" class="form-control form-control-sm" value="<?=$data_resep['id_menu']?>" hidden>
                          <div class="row">
                            <div class="col-lg-2">
                              Kode Menu
                            </div>
                            <div class="col-lg-1">
                              :
                            </div>
                            <div class="col=lg-1">
                              <?=$data_resep['kode_menu']?>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              Nama Menu
                            </div>
                            <div class="col-lg-1">
                              :
                            </div>
                            <div class="col=lg-1">
                              <?=$data_resep['nama']?>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              Harga
                            </div>
                            <div class="col-lg-1">
                              :
                            </div>
                            <div class="col=lg-2">
                              Rp
                            </div>
                            <div class="col-lg-1">
                              <input type="number" name="harga" min="0" class="form-control form-control-sm" value="<?php if($data_resep['harga']>0)
                                  {echo number_format($data_resep['harga'],0,",",".");}
                                  else{echo '0';}?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Takaran</th>
                      <th>Satuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                      $nomor=0;
                      foreach($resep->result_array() as $data_resep):
                        $nomor++;
                    ?>
                    <tr>
                      <td><?=$nomor?></td>
                      <td><?=$data_resep['nama_bahan']?></td>
                      <td><?=$data_resep['takaran']?></td>
                      <td><?=$data_resep['satuan']?></td>
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

<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- new add on custon ja -->
<script src="<?php echo base_url() ?>assets/dist/js/resep/resep.js"></script>
<!-- C:\xampp\htdocs\cafe_skrps\application\views\resep -->

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
  
</script>
</body>
</html>
