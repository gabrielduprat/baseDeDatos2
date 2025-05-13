<?php
    $archivo = './user.json';
    $json_data = file_get_contents($archivo);
    if ($json_data === FALSE) {
        die ("Error: No se pudo leer el archivo");
    }
    // decodificar json_data
    $data = json_decode($json_data, true); // el true significa que se desea que el decode devuelva un array
    // verificar si decodificado correctamente
    if (json_last_error() !== JSON_ERROR_NONE) {
        die ("Error: No se pudo decodificar el archivo".": ".json_last_error_msg());
    }
    // mostrar todos los usuarios
    foreach ($data as $user) {
        echo "Nombre: " . $user['name'] . "<br>";
        echo "Apellido: " . $user['lastName'] . "<br>";
        echo "Teléfono: " . $user['phone'] . "<br>";
        echo "Dirección: " . $user['address']['street'] . " " . $user['address']['number'] . "<br>";
        echo "<br>";
    }
    // defino matriz de usuarios
    $new_user = [
        "id" => 3,
        "name" => "Gabriel",
        "lastName" => "Díaz",
        "phone" => 23389,
        "active" => true,
        "address" => [
            "street" => "Alem",
            "number" => 185
        ]
    ];
    $data[] = $new_user;
    $json_final = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    // guardar nuevo usuario
    if(file_put_contents($archivo, $json_final)) {
        echo "<br>";
        echo "Nuevo usuario guardado correctamente";
        echo "<br>";
    } else {
        echo "Error al guardar el archivo";
    }
    // mostrar el usuario nuevo
    echo "<pre>".htmlspecialchars($json_final)."</pre>";
    /*echo "Nombre: " . $new_user['name'] . "<br>";
    echo "Apellido: " . $new_user['lastName'] . "<br>";
    echo "Teléfono: " . $new_user['phone'] . "<br>";
    echo "Dirección: " . $new_user['address']['street'] . " " . $new_user['address']['number'] . "<br>";
    echo "<br>";*/

    class User {
        public $id;
        public $name;
        public $lastName;
        public $phone;
        public $active;
        public $address;

        function __construct($id, $name, $lastName, $phone, $active, $address) {
            $this->id = $id;
            $this->name = $name;
            $this->lastName = $lastName;
            $this->phone = $phone;
            $this->active = $active;
            $this->address = $address;
        }
    }
    
?>