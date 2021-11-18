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
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
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
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index3.html" class="navbar-brand">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DREAM CAFE Coffe & Tea</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      </div>
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
        <div class="row">
          <div class="col-lg-8">
            <div class="card card-row">
              <div class="card-body overflow-auto">

                <div class="container">
                  <div class="row">
                    <?php
                      $nomor=0;
                      foreach($menu->result_array() as $data_menu):
                        $nomor++;
                    ?>
                    <div class="col-lg-4" id="menu">
                      <a href="<?php echo base_url() ?>index.php/kasir_controler/add_cart/<?=$data_menu['id_menu']?>">
                        <div class="card">
                          <img src="<?php echo base_url() ?>assets/dist/img/default-150x150.png" alt="" class="card-img-top">
                          <div class="card-body">

                            <!-- <input type="text" id="menuu" name="id_menu" value="<?=$data_menu['id_menu']?>"> -->

                            <?=$data_menu['nama']?>
                          </div>
                        </div>
                      </a>
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
          
          <div class="col-lg-4">
            <div class="card h-100">
              <div class="card-header">
                <h5 class="card-title m-0">Nota</h5>
                <div class="card-tools">
                  <a href="<?php echo base_url() ?>index.php/kasir_controler/delete_cart">
                    <button type="button" class="btn btn-outline-danger btn-sm" id="delete_cart">
                      <i class="fa fa-trash"></i>
                    </button>
                  </a>
                </div>
              </div>
              <div class="card-body">

                <div class="container" id="nota">
                  <?php
                    $cart=array();
                    $cart=$this->session->userdata('Cart');
                    // echo count($cart);
                    if($cart!=null){
                      foreach($cart as $data_cart):
                        // echo $data_cart;
                        foreach($menu->result_array() as $data_menu):
                          if($data_menu['id_menu']==$data_cart){
                  ?>
                  <div class="row">
                    <div class="col-sm">
                      <div class="card">
                        <div class="card-body">
                          <div class="float-left">
                            <?=$data_menu['nama']?>
                          </div>
                          <div class="float-right">
                            Rp 11.000
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                          }
                        endforeach;
                      endforeach;

                    }
                  ?>
                </div>

              </div>
              <!-- <div class="card-footer">
                hoooo
              </div> -->
            </div>

          </div>
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
</body>
</html>
