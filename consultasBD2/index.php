<?php

include 'conexion.php';

// Ejecutar una consulta SQL
$res = $con->query("SELECT * FROM materias");

// Verificar si hay resultados
if ($res && $res->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>NombreMateria</th><th>HoraInicio</th><th>CargaHoraria</th></tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['NombreMateria'] . "</td>";
        echo "<td>" . $row['HoraInicio'] . "</td>";
        echo "<td>" . $row['CargaHoraria'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo '<br>';
} else {
    echo 'No se encontraron registros';
}

// Cerrar la conexión
//$con->close();
?>

<!-- Formulario para hacer la consulta SQL -->
<form action="index.php" method="post">
    <label>Consulta SQL:</label>
    <input name="consulta" id="consulta" type="text" />
    <button type="submit">Consultar</button>  <!-- Corregir el error de 'buttom' -->
</form>

<?php

// Verificar si hay una consulta enviada
if (isset($_POST['consulta'])) {
    $SQL = $_POST['consulta'];
    echo "<h3>Consulta SQL: </h3>";
    echo "<pre>" . htmlspecialchars($SQL) . "</pre>";  // Mostrar consulta de forma segura

    // Ejecutar la consulta
    $res = $con->query($SQL);

    // Verificar si hay resultados
    if ($res && $res->num_rows > 0) {
        // Obtener los nombres de las columnas dinámicamente
        $columns = $res->fetch_fields();
        
        // Mostrar la tabla con las columnas dinámicas
        echo "<table border='1'>";
        echo "<tr>";
        
        // Imprimir las cabeceras de la tabla basadas en los nombres de las columnas
        foreach ($columns as $column) {
            echo "<th>" . htmlspecialchars($column->name) . "</th>";
        }
        echo "</tr>";
        
        // Recorrer los resultados y mostrar las filas de la tabla
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
        echo '<br>';
    } else {
        echo 'No se encontraron registros';
    }
}  

// usar readUser.php para leer el usuario
require_once 'readUser.php';

?>
