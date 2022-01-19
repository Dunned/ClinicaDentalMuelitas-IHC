<?php  
       require 'funciones/sesiones.php'; //verificar session
       require 'funciones/funciones.php'; 
       include 'templates/header.php'; 
       $id=$_GET['id'];
       if (!filter_var($id,FILTER_VALIDATE_INT)) {
          die('Error!!!');
       }
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

                <?php
                    $sql="SELECT * FROM admins WHERE id_admin = $id" ;
                    $resultado=$conn->query($sql);
                    $admin=$resultado->fetch_assoc();
                    
                ?>
                <form role="form" name="crear-admin" id="crear-admin" method="post" action="modelo-admin.php">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="usuario">Usuario:</label>
                              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']?>">
                          </div>
                          <div class="form-group">
                              <label for="nombre">Tu Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo" value="<?php echo $admin['nombre']?>">
                          </div>
                          <div class="form-group">
                              <label for="password">Contraseña:</label>
                              <input type="password" class="form-control" id="password" name="password"   placeholder="Contraseña para iniciar Sesión">
                          </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                          <input type="hidden" name="registro" value="actualizar">
                          <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                          <button type="submit" class="btn btn-primary">Añadir</button>
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
