<?php
require_once "conexion.php";
require 'phpqrcode/qrlib.php'; // Incluye la librería para QR

$nombre = $_POST["nombre"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$imagen_url = "";

function insertar_registro($conn, $nombre, $rut, $email, $telefono, $imagen_url) {
    $sql = "
    INSERT INTO asistentes (nombre, rut, email, telefono, imagen)
    VALUES (?, ?, ?, ?, ?)
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $rut, $email, $telefono, $imagen_url);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        return $conn->insert_id; // Retorna el ID del nuevo registro
    } else {
        echo "Error al insertar registro: " . $stmt->error;
        return false;
    }
}

function subir_archivo($archivo) {
    $archivo_nombre = $archivo["name"];
    $directorio = "imagenes/";
    $archivo_destino = $directorio . basename($archivo_nombre);

    if (move_uploaded_file($archivo["tmp_name"], $archivo_destino)) {
        echo "El archivo $archivo_nombre ha sido subido correctamente<br>";
        return $archivo_destino;
    } else {
        echo "Ocurrió un error al subir el archivo<br>";
        return "";
    }
}

$imagen_url = subir_archivo($_FILES["imagen"]);

// Insertar el registro y obtener el ID del asistente
$asistente_id = insertar_registro($conn, $nombre, $rut, $email, $telefono, $imagen_url);

if ($asistente_id) {
    // Generar el enlace para consultar los datos del asistente
    $enlace = "ver_asistente.php?id=" . $asistente_id;
    
    // Generar el archivo del código QR
    $rutaQr = "qrcodes/qr_$asistente_id.png";
    QRcode::png($enlace, $rutaQr);

    // Guardar la ruta del código QR en la base de datos
    $sqlUpdate = "UPDATE asistentes SET codigo_qr = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("si", $rutaQr, $asistente_id);
    $stmtUpdate->execute();

    if ($stmtUpdate->affected_rows > 0) {
        // Mensaje de éxito y enlace a la tarjeta virtual
        echo "¡Registro exitoso! <a href='$rutaQr' target='_blank'>Ver tarjeta virtual del asistente</a>";
    } else {
        echo "Error al actualizar el código QR en la base de datos.";
    }
} else {
    echo "Error al registrar al asistente.";
}

?>
