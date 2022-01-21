<?php  
       require 'funciones/sesiones.php'; //Verificar que exista una sesion iniciada
       require 'funciones/funcionAdmin.php';
       require 'funciones/funciones.php'; 
       $id=$_GET['id']; //Obtenemos el ID de la pagina anterior
        if (!filter_var($id,FILTER_VALIDATE_INT)) { //validamos que id sea entero
            die('error');
        } 
       include 'templates/header.php'; 
       include 'templates/barra.php'; 
       include 'templates/navegacion.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Administrador
        <small>Llenar el formulario para editar el administrador</small>
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
                    $sql="SELECT * FROM admins WHERE id_admin=$id";
                    $resultado=$conn->query($sql);
                    $admin=$resultado->fetch_assoc();
                ?>
                
                <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                      <div class="box-body">

                          <div class="form-group">
                              <label for="usuario">Usuario:</label>
                              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario"
                              value="<?php echo $admin['usuario'];?>">
                          </div>

                          <div class="form-group">
                              <label for="nombre">Tu Nombre:</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo" value="<?php echo $admin['nombre'];?>">
                          </div>

                          <div class="form-group">
                              <label for="password">Contraseña:</label>
                              <input type="password" class="form-control" id="password" name="password"   placeholder="Contraseña para iniciar Sesión">
                          </div>

                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                          <input type="hidden" name="registro" value="actualizar">
                          <input type="hidden" name="id_registro" value="<?php echo $id;?>">
                          <button type="submit" class="btn btn-primary">Guardar</button>
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
