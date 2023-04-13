<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KASIR</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- custom -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bg_kopi.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-lg navbar-light navbar-white">
      <div class="container">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DREAM CAFE Coffe & Tea</span>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

        </div>


      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="notifications-menu">
            <a href="<?php echo base_url() ?>index.php/login_controler/log_out">
              <i class="fa fa-power-off"></i>
              Log Out
            </a>
          </li>

          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container overflow-auto">
          <div class="row ">
            <div class="col-lg-3 ">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-header d-flex justify-content-center">
                      <h5 class="card-title m-0">Menu</h5>
                      <div class="card-tools">
                        <a href="<?php echo base_url() ?>index.php/kasir_controler/delete_cart">
                        </a>
                      </div>
                    </div>
                    <div class="card-body">

                      <div class="sidebar">
                        <nav class="mt-2">
                          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <p>
                                  Beverages
                                  <i class="right fas fa-angle-left"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="./index.html" class="nav-link">
                                    <p>Coffe Base</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="./index2.html" class="nav-link">
                                    <p>Milk Base</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="./index3.html" class="nav-link">
                                    <p>Fruits</p>
                                  </a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <p>
                                  Snack
                                  <i class="right fas fa-angle-left"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="./index.html" class="nav-link">
                                    <p>salty</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="./index2.html" class="nav-link">
                                    <p>sweet</p>
                                  </a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <p>
                                  Food
                                  <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <p>
                                  Promo
                                  <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                              </a>
                            </li>
                          </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-header d-flex justify-content-center">
                      <h5 class="card-title m-0">Order</h5>
                      <div class="card-tools">
                        <a href="<?php echo base_url() ?>index.php/kasir_controler/delete_cart">
                        </a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">Total</div>
                            <div class="col">Rp 0,00-</div>
                          </div>
                          <div class="row">
                            <div class="col">PPn</div>
                            <div class="col">Rp 0,00-</div>
                          </div>
                          <hr>
                          <div class="row font-weight-bold h5">
                            <div class="col">Total</div>
                            <div class="col">Rp 0,00-</div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn btn-block btn-outline-dark">List Order</button>
                      <button type="button" class="btn btn-block btn-dark">Pay</button>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="col-lg">
              <div class="card card-row">
                <div class="card-header d-flex justify-content-center">
                  Coffe Base
                </div>
                <div class="card-body overflow-auto">

                  <div class="container">
                    <div class="row">
                      <?php
                      $nomor = 0;

                      foreach ($menu->result_array() as $data_menu) :
                        $nomor++;
                      ?>
                        <div class="col-lg-4 " id="menu">
                          <div class="card" data-toggle="modal" data-target="#exampleModal">
                            <!-- <img src="<?php echo base_url() ?>assets/dist/img/default-150x150.png" alt="" class="card-img-top"> -->
                            <img src="<?php echo base_url() ?>assets/image/menu/<?= $data_menu['gambar'] ?>" alt="" class="card-img-top img-menu">

                            <div class="card-body">

                              <!-- <input type="text" id="menuu" name="id_menu" value="<?= $data_menu['id_menu'] ?>"> -->
                              <div class="row">
                                <div class="col">
                                  <?= $data_menu['nama'] ?>

                                </div>
                                <div class="col float-right">
                                  Rp<?= isset($data_menu['harga']) ? $data_menu['harga'] : '0' ?>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      endforeach
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->

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

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

  <script src="<?php echo base_url() ?>assets/dist/js/kasir/kasir.js"></script>

  <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body h1 float-center">
          Do you want to add this menu to your list order?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-block">Yes</button>
          <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>