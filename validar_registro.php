<?php  if (isset($_POST['submit'])) { 
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $tipo=$_POST['tipo'];
        $total=$_POST['total_pedido'];
        $fecha=date('Y-m-d H:i:s');
        //PEDIDOS
        $registro=$_POST['registro'];
        $blanqueamiento=$_POST['extra1'];
        $cuidado=$_POST['extra2'];
        include 'includes/funciones/funciones.php';
        $pedido=productos_formateador(1,$blanqueamiento,$cuidado);
        try {
            require 'includes/funciones/bd_conexion.php';
            $stmt=$conn->prepare("INSERT INTO registrados(nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pedido,total_pagado) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$nombre,$apellido,$email,$fecha,$pedido,$total);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location: validar_registro.php?exitoso=1');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
     }; ?>


<?php include 'includes/templates/header.php'; ?>


<section class="seccion contenedor">
    <h2>Resumen Registro</h2>
    <?php
        if (isset($_GET['exitoso'])) { 
            if ($_GET['exitoso']=="1") {
                echo "Registro Exitoso";
            }
    }
    ?>
    
</section>

<?php include 'includes/templates/footer.php'; ?>