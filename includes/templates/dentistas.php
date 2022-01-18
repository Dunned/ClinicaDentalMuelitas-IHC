<section class="contenedor-especialidades">
        <h2>Nuestros Profesionales</h2>
        <?php
        try {
            require 'includes/funciones/bd_conexion.php';
            $sql="SELECT * FROM dentistas";
            $resultado=$conn->query($sql);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        ?>
                <section class="doctores contenedor seccion">
                    <ul class="lista-doctores">
            <?php
                while($dentista=$resultado->fetch_assoc()) { ?>
                        <li>
                            <div class="doctor">
                                <a class="dentista-info" href="#dentista<?php echo $dentista['id_dentista'];?>">
                                    <img src="img/<?php echo $dentista['url_imagen'] ?>" alt="FotoDoctor">
                                    <p><?php echo $dentista['nombre_dentista']." ".$dentista['apellido_dentista']?></p>
                                </a>
                            </div>
                        </li>
                        <div style="display:none">
                            <div class="dentista-info" id="dentista<?php echo $dentista['id_dentista']; ?>">
                                <h2>
                                    <?php echo $dentista['nombre_dentista']." ".$dentista['apellido_dentista']; ?>
                                </h2>
                                <img src="img/<?php echo $dentista['url_imagen'] ?>" alt="FotoDoctor">
                                <p>
                                    <?php 
                                        echo $dentista['descripcion_dentista'];
                                    ?>    
                                </p>
                            </div>
                        </div>
        <?php   } //while; ?>
                    </ul>
                </section>
        <?php $conn->close(); ?>
    </section>