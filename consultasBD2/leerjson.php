<?php

include 'conexion.php';

$sql = "SELECT * FROM productos";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $detalle = json_decode($row['detalles'], true);
        echo "Nombre: " . $row['nombre'] . "<br>";
        echo "Detalles: " . $row['detalles'] . "<br>";
        echo "<br>";
        // echo ($row['nombre'].$detalle['marca'].$detalle['ram']);
        //echo "<br>";
        //mostrar marca y ram
        echo "Marca: " . $detalle['marca'] . "<br>";
        
        echo "Ram: " . $detalle['ram'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron registros";
}

?>