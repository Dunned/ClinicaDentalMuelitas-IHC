<?php

require 'funciones/funciones.php';
if (isset($_POST['usuario'])) {
    $usuario=$_POST['usuario'];
}
if (isset($_POST['nombre'])) {
    $nombre=$_POST['nombre'];
}
if (isset($_POST['password'])) {
    $password=$_POST['password'];
}
if (isset($_POST['id_registro'])) {
    $id_registro=$_POST['id_registro'];
}

if (isset($_POST['login-admin'])) {
    try {
        $stmt=$conn->prepare("SELECT * FROM admins WHERE usuario=?"); 
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin,$usuario_admin,$nombre_admin,$password_admin,$editado,$rol);
        if ($stmt->affected_rows) {
            $existe=$stmt->fetch();
            if ($existe) {
                if (password_verify($password,$password_admin)) {
                    session_start();//iniciamos session
                    $_SESSION['usuario']=$usuario_admin;
                    $_SESSION['nombre']=$nombre_admin;
                    $_SESSION['rol']=$rol;
                    $_SESSION['id']=$id_admin;
                    $respuesta=array(
                        'respuesta'=>'exitoso',
                        'usuario'=>$nombre_admin
                    );
                }else{
                    $respuesta=array(
                        'respuesta'=>'error'
                    );
                }
            }else{
                $respuesta=array(
                    'respuesta'=>'error'
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error".$e->getMessage();
    }
    die(json_encode($respuesta));
}