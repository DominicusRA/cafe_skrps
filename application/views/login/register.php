<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dream Cafe || Register</title>
  <style>
   .bg-kopi {
    background-image: url("<?php echo base_url() ?>assets/image/bg_kopi.jpeg");  
   }
   
 </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- custom -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bg_kopi.css">
</head>
<body class="hold-transition login-page bg-kopi">
  <div class="card bg-blur">
    <div class="card-body">
      <div class="login-box">
        <div class="login-logo">
          <p class="text-white"><b>Dream Cafe</b> || coffe & tea</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Regist Your Account !!!</p>
      
            <form action="<?php echo base_url() ?>index.php/login_controler/registeradd" method="post">
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select name="akses" id="akses" class="form-control select2" style="width: 100%;">
                  <option selected="selected"></option>
                  <?php
                    foreach($akses->result_array() as $data_akses):
                  ?>
                  <option value="<?=$data_akses['id_akses']?>"><?=$data_akses['akses']?></option>
                  <?php
                    endforeach
                  ?>
                </select>
                <!-- <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div> -->
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-sm">
                  <a href="<?php echo base_url()?>index.php/login_controler/index">
                    <button type="button" class="btn btn-danger btn-block">Batal</button>
                  </a>
                </div>
                <div class="col-sm">
                  <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
      
              </div>
            </form>
            <!-- /.social-auth-links -->
      
            
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>

    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
