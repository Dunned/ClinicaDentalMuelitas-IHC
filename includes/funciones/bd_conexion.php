<?php
    $conn=new mysqli('localhost','root','admin','clinicadentalmuelitas');
    if ($conn->connect_error) {
        echo $error->$conn->connect_error;
    }
?>