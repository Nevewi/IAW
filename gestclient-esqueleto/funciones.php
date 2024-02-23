<?php

function conectaBD()
{
    // Conexión a la base de datos
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $dbName = "Banco";
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    return $conn;


}

function insertarCliente($dni, $nombre, $direccion, $telefono) {
    //if (!existeDNI($dni)) {
    $conexion = conectaBD();
    $statement = $conexion->stmt_init();
    $statement->prepare("INSERT INTO cliente VALUES (?, ?, ?, ?) ;");
    
    $statement->bind_param('ssss', $dni, $nombre, $direccion, $telefono);
    //Ejecutar el statement
    $statement->execute();
    // Ejecutar la consulta
    echo "El cliente se creo exitosamente, si no se creo el usuario con dni: " . $dni . " ya existia";
    //} else {
    //        echo "El usuario con dni: " . $dni . " ya existe";
    //}
    
}


function modificaCliente($dni, $nombre, $direccion, $telefono, $dniAntiguo) {
    $conexion = conectaBD();    
    $statement = $conexion->stmt_init();
        $statement->prepare("UPDATE cliente SET dni=?, nombre=?, direccion=?, telefono=? WHERE dni = ? ;"  );
       
        $statement->bind_param('sssss',$dni, $nombre, $direccion, $telefono, $dniAntiguo);
        //Ejecutar el statement
        $statement->execute();
        // Ejecutar la consulta
            echo "El cliente ha sido modificado exitosamente";
}

function borrarCliente($dni) {
    $conexion = conectaBD();    
    $statement = $conexion->stmt_init();
    $statement->prepare("DELETE FROM cliente WHERE dni = ? ;"  );
    $dni = $_GET['dni'];
    $statement->bind_param('s',$dni);
    //Ejecutar el statement
    $statement->execute();
    // Ejecutar la consulta
        echo "El cliente ha sido eliminado exitosamente";
}

