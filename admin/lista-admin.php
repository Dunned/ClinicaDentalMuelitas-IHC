<?php 
       require 'funciones/sesiones.php'; //verificar session
       require 'funciones/funciones.php'; 
       include 'templates/header.php'; 
       include 'templates/barra.php'; 
       include 'templates/navegacion.php'; 
?>

  <div class="content-wrapper">
      <section class="content-header">
            <h1>
              Listado de Administradores<small>Clinica Dental Muelitas</small>
            </h1>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manejo de Usuarios en esta Sección</h3>
            </div>


            <div class="box-body">
                  <table id="registros" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                          <th>Usuario</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php
                            try {
                              $sql="SELECT id_admin,usuario,nombre FROM admins";
                              $resultado=$conn->query($sql);
                            } catch (Exception $e) {
                              $error=$e->getMessage();
                              echo $error;
                            }

                            while ($admin=$resultado->fetch_assoc()) { ?>
                              
                              <tr>
                                <td><?php  echo $admin['usuario'];?></td>
                                <td><?php  echo $admin['nombre'];?></td>
                                <td>

                                  <a href="editar-admin.php?id=<?php echo $admin['id_admin']; ?>"
                                  class="btn bg-orange btn-flat margin">
                                  <i class="fa fa-pencil"></i></a>

                                  <a href="#" data-id="<?php echo $admin['id_admin']; ?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                                  <i class="fa fa-trash"></i></a>
                                </td>
                              </tr>

                          <?php }
                          ?>
                        </tbody>

                    <tfoot>
                    <tr>
                      <th>Usuario</th>
                      <th>Nombre</th>
                      <th>Acciones</th>
                    </tr>
                    </tfoot>
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

  <?php  include 'templates/footer.php'; 
  ?>
