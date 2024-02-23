<?php

function conectaBD()
{
    // Conexión a la base de datos
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $dbName = "Almacen";
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    return $conn;

}

//Insertar un producto
function insertarproducto($nombre, $descripcion, $precio) {

    $conexion = conectaBD();
    $statement = $conexion->stmt_init();
    $statement->prepare("INSERT INTO producto(nombre, descripcion, precio) VALUES (? ,?, ?)");
    $statement->bind_param('sss',$nombre, $descripcion, $precio);
    //Ejecutar el statement
    $statement->execute();
    // Ejecutar la consulta
    
}


//modificar un producto
function modificaproducto($descripcion, $precio, $id) {
    $conexion = conectaBD();    
    $statement = $conexion->stmt_init();
        $statement->prepare("UPDATE producto SET descripcion=?, precio=? WHERE id = ? ;"  );
       
        $statement->bind_param('sss', $descripcion, $precio, $id);
        //Ejecutar el statement
        $statement->execute();
        // Ejecutar la consulta
            echo "El producto ha sido modificado exitosamente";
    
}



//borrar un producto
function borrarproducto($id) {
    $conexion = conectaBD();    
    $statement = $conexion->stmt_init();
    $statement->prepare("DELETE FROM producto WHERE id = ? ;"  );
    $id = $_GET['id'];
    $statement->bind_param('s',$id);
    //Ejecutar el statement
    $statement->execute();
    // Ejecutar la consulta
        echo "El producto ha sido eliminado exitosamente";
}

