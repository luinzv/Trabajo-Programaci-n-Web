<?php
    $db_host = "localhost";
    $db_name = "registro_evento_contreras";
    $db_user = "root";
    $db_pass = "";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // HUPN

    if(!$conn){
        die("Conexión Fallida" . mysqli_connect_errno());
    }
?>