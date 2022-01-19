<?php 
function productos_formateador($registro,$blanqueamiento="",$cuidado=""){
    require 'bd_conexion.php';
    $sql="SELECT * FROM citas INNER JOIN dentistas ON
    citas.id_dentista=dentistas.id_dentista" ;
    $resultado=$conn->query($sql)->fetch_assoc();
    $valor="Cita con el dentista ".$resultado["nombre_dentista"]." ".$resultado["apellido_dentista"]." el dia ".$resultado["dia_cita"]." a las ".$resultado["hora_cita"].".";
    if ($blanqueamiento!="") {
        $valor.=" Adicional : Servicio de Blanqueamiento Basico.\n";
    };
    if ($cuidado!="") {
        $valor.="Adicional : Kit de cuidado dental";
    };
    return $valor;
}?>