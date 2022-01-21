<?php
function usuario_Administrador(){
    if (!revisar_Administrador()) {
        header('Location:admin-area.php');
        exit;
    }
}

function revisar_Administrador(){
    return $_SESSION['rol']==1;
}

usuario_Administrador();