<?
include_once("funciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Almacen</title>
  
</head>

<body>

  <div style="background-color: lightyellow;">
    <div >
      <h1 >Almacen de Jesus</h1>
      <h2>Gestión de productos</h2>
      <?php

      // Conexión a la base de datos
      $host = "db";
      $dbUsername = "root";
      $dbPassword = "test";
      $dbName = "Almacen";
     $conexión = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
     

      //obtener la acción del botón que se ha pulsado en el formulario
      // Dar de baja un producto
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
        $id = $_GET['id'];
        borrarproducto($id);
      }


      // Dar de alta un producto
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear' && strlen($_GET['nombre']) >=5 && $GET_precio['precio'] >= 0) {
      //hacer llamada a BD con la consulta oportuna
          $nombre = $_GET['nombre'];
          $descripcion = $_GET['descripcion'];
          $precio = $_GET['precio'];
        insertarproducto($nombre, $descripcion, $precio);
        echo "El producto se creo exitosamente, si no se creo el usuario con esa id ya existia";
      } else{
        echo "El nombre no supera el limite requerido o el precio es menor de 0";
      }
      



      // Modificar un producto
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
        $descripcion = $_GET['descripcion'];
        $precio = $_GET['precio'];
        $id = $_GET['id'];

          modificaproducto($descripcion, $precio, $id);
        }

        
      // Listado
      //Este listado se muestra siempre
      //hacer llamada a BD con la consulta del listado de productos
      $consulta;
      ?>

      <table >
        <tr>
          <th>Nombre</th>
          <th>descripcion</th>
          <th>id</th>
          <th>Precio</th>
          <th></th>
        </tr>

        <form action="index.php" method="GET">
          <tr>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="descripcion"></td>
            <td><input type="number" name="id"></td>
            <td><input type="number" name="precio"></td>
            <input type="hidden" name="accion" value="crear">
            <td><input type="submit" value="Añadir"></td>
          </tr>
        </form>

        <?php
//mostrar los productos de la bd en la tabla
// Simulación de datos de la base de datos
$statement = $conexión->stmt_init();
$statement->prepare("SELECT * FROM producto");
 //Ejecutar el statement
 $statement->execute();
 //Obtener resultados como un array asociativo
 $registros = $statement->get_result();

foreach ($registros as $registro) {
  echo "<tr>
    <td>". $registro['nombre']." </td>
    <td>". $registro['descripcion']." </td>
    <td>".$registro['id']." </td>
    <td>". $registro['precio']." </td>
    <td>
      <a href=\"modificar.php?&id="."&nombre=". $registro['nombre'] ."&descripcion=". $registro['descripcion'] . $registro['id'] . "&precio=". $registro['precio']." \">
        <button >Modificar</button>
      </a>
    </td>
    <td>
      <a href=\"index.php?accion=borrar&id=". $registro['id']."\">
        <button>
          <img width='20px' src='papelera.png' >
        </button>
      </a>
    </td>
  </tr>";
}
?>
      </table>
    </div>
  </div>



</body>

</html>