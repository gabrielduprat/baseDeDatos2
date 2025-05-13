<?php
include 'conexion.php';

$producto = [
    "nombre" => "Tablet",
    "detalles" => json_encode([
        "marca" => "Apple",
        "ram" => 4,
        "colores" => ["gris", "dorado"]
    ])
];

$json = json_encode($producto);

$stmt = $con->prepare("INSERT INTO productos (nombre, detalles) VALUES (?, ?)");
$stmt->bind_param("ss", $producto['nombre'], $producto['detalles']); //"ss" significa que el primer parámetro es un string y el segundo es un string

if($stmt->execute()) {
    echo "Producto insertado correctamente";
} else {
    echo "Error al insertar el producto";
}

// insertar en la base de datos
/*$sql = "INSERT INTO productos (nombre, detalles) VALUES ('$producto->nombre', '$json')";
$con->query($sql);

// consultar desde la base de datos
$sql = "SELECT * FROM productos";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "Nombre: " . $row['nombre'] . "<br>";
        echo "Detalles: " . $row['detalles'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron registros";
}*/