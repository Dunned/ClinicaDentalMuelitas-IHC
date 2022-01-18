<?php include 'includes/templates/header.php'; ?>


    <section class="contenedor-especialidades">
        <h2>Calendario de Eventos</h2>
        <?php
        try {
            require 'includes/funciones/bd_conexion.php';
            $sql="SELECT servicios.id_servicio,servicios.nombre_servicio,servicios.complejidad_servicio,servicios.tipo_servicio,servicios.tiempo_especialidad,dentistas.nombre_dentista,dentistas.nombre_dentista,dentistas.apellido_dentista,especialidades.nombre_especialidad,especialidades.icono_especialidad FROM servicios INNER JOIN dentistas ON servicios.dentista_asignado=dentistas.id_dentista INNER JOIN especialidades ON servicios.id_especialidad=especialidades.id_especialidad";
            $resultado=$conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        ?>

        <div class="servicios">
            <?php
                $listaServicios=array(); //arreglo que almacena todos los datos
                while($servicios=$resultado->fetch_assoc()) { ?>
                 <?php
                    $especialidad=$servicios['nombre_especialidad']; //obtenemos especialidad 
                    $servicio=array( //en un arreglo guardamos los datos
                        'titulo'=>$servicios['nombre_servicio'],
                        'duracion'=>$servicios['tiempo_especialidad'],
                        'tipo'=>$servicios['tipo_servicio'],
                        'complejidad'=>$servicios['complejidad_servicio'],
                        'dentista'=>$servicios['nombre_dentista']." ".$servicios['apellido_dentista'],
                        'especialidad'=>$servicios['nombre_especialidad'],
                        'icono'=>'fa'." ".$servicios['icono_especialidad'],
                    );
                    $listaServicios[$especialidad][]=$servicio; //agrupamos por especialidad
                 ?>
        <?php   } //while; ?>

        <?php
            foreach ($listaServicios as $esp => $contenidoLista) { ?>
                <div class="contenedor-por-especialidad">
                    <div class="titulo-contenedor-especialidad">
                        <h3>
                            <i class="<?php echo $contenidoLista[0]["icono"];?>"></i>
                            <?php echo $esp; ?>
                        </h3>
                    </div>
                    <div class="contenedor-servicios">
                    <?php
                        foreach ($contenidoLista as $contenido) { ?>
                            <div class="cuadro-servicio">
                                <p class="titulo"> <?php echo $contenido['titulo']; ?> </p>

                                <p class="duracion"><i class="far fa-clock"></i> Duracion Promedio: <?php echo $contenido['duracion']; ?> </p>

                                <p class="tipo"><i class="far fa-chart-bar"></i> Tipo de Servicio: <?php echo $contenido['tipo']; ?> </p>

                                <p class="complejidad"><i class="fas fa-tachometer-alt"></i> Complejidad: <?php echo $contenido['complejidad']; ?> </p>

                                <p class="dentista"><i class="fas fa-user-md"></i> Dentista: <?php echo $contenido['dentista']; ?> </p>
                            </div>
                    <?php };//fin foreach contenido ?>
                    </div>
                </div>
            <?php }; //fin foreach especialidades?>

        </div>
        <?php $conn->close(); ?>
    </section>

<?php include 'includes/templates/footer.php'; ?>