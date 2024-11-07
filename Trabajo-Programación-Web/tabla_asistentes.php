<?php
require 'conexion.php';

$query = "SELECT nombre, rut, email, telefono, fecha_registro FROM asistentes";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistentes Registrados</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>

    <h1>Asistentes del Evento
    </h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RUT</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fecha de Registro</th>
                <th>Ver Tarjeta Virtual</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['rut'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telefono'] . "</td>";
                echo "<td>" . $row['fecha_registro'] . "</td>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>
