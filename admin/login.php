<?php  
       session_start();
       $cerrar_sesion=$_GET['cerrar_sesion'] ?? null;
       if ($cerrar_sesion) {
         session_destroy();
       }
       require 'funciones/funciones.php'; 
       include 'templates/header.php'; 
?>
  <body class="hold-transition login-page">
  <div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>CLINICA</b>DENTAL MUELITAS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesion Aquí</p>
    
    <form role="form" name="login-admin-form" id="login-admin" method="POST" action="login-admin.php"> 
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <input type="hidden" name="login-admin" value="1">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
            </div>
        </div>
    </form>
     <div class="text-center">
            <a href="/index.php" class="link-vista-cliente">Volver Vista Cliente</a>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

  <?php  include 'templates/footer.php'; 
  ?>
