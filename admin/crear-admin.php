<?php  
       require 'funciones/sesiones.php'; //verificar session
       require 'funciones/funcionAdmin.php';
       require 'funciones/funciones.php'; 
       include 'templates/header.php'; 
       include 'templates/barra.php'; 
       include 'templates/navegacion.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Administrador
        <small>Llenar el formulario para crear un administrador</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
          <!-- Main content -->
          <section class="content">
            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Crear Administrador</h3>
              </div>
              <div class="box-body">
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="usuario">Usuario:</label>
                              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                          </div>
                          <div class="form-group">
                              <label for="nombre">Tu Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo">
                          </div>
                          <div class="form-group">
                            <label for="rol">Escoge un Rol: </label>
                            <select name="rol" id="rol">
                                <option value="0">Administrador</option>
                                <option value="1">Supervisor</option>
                              </select>  
                          </div>
                          <div class="form-group">
                              <label for="password">Contraseña:</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña para iniciar Sesión">
                          </div>
                          <div class="form-group">
                              <label for="password">Repetir Contraseña:</label>
                              <input type="password" class="form-control" id="repetir_password" name="repetir_password"  placeholder="Repetir Contraseña para iniciar Sesión">
                              <span id="resultado_password" class="help-block"></span>
                          </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                          <input type="hidden" name="registro" value="nuevo">
                          <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                      </div>
                 </form>
              </div>
            </div>
            <!-- /.box -->

          </section>
      </div>
    </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php  include 'templates/footer.php'; 
  ?>
