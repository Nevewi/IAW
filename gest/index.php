<?php 
session_start(); 
require_once("funciones.php");
if(isset($_SESSION['usuario'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
</head>

<body>

  <div style="background-color: lightblue;">
    <div >
      <h1 >GESTCLIENT</h1>
      <h2>Gestión de clientes de CertiBank</h2>
<?php
// Conexión a la base de datos
$conn = mysqli_connect('db', 'root', 'test', 'banco');

//obtener la acción del botón que se ha pulsado en el formulario

// Mirar si la acción es borrar un cliente
if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
  $dniborrar = $_GET['dni'];
  borrarCliente($conn, $dniborrar);
}

// Mirar si la acción es insertar un cliente
if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
  $dni = $_GET['dni'];
  $nombre = $_GET['nombre'];
  $direccion = $_GET['direccion'];
  $telefono = $_GET['telefono'];

  if (!clienteExiste($dni)) {
    darDeAltaCliente($conn, $dni, $nombre, $direccion, $telefono);
  } else {
      print("El DNI ya existe");
  }
}

// Mirar si la acción es modificar un cliente
if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
  $dninuevo = $_GET['dni'];
  $nombrenuevo = $_GET['nombre'];
  $direccionnuevo = $_GET['direccion'];
  $telefononuevo = $_GET['telefono'];
  $dniviejo = $_GET['dniAntiguo'];
  modificarCliente($conn, $dninuevo, $nombrenuevo, $direccionnuevo, $telefononuevo, $dniviejo);
}
// Listado
//Este listado se muestra siempre
//hacer llamada a BD con la consulta del listado de clientes
$consulta;
?>

      <table >
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th></th>
        </tr>

        <form action="index.php" method="GET">
          <tr>
            <td><input type="text" name="dni"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono"></td>
            <input type="hidden" name="accion" value="crear">
            <td><input type="submit" value="Añadir"></td>
          </tr>
        </form>

        <?php
        //mostrar los clientes de la bd en la tabla
        $statement = $conn->stmt_init();
        $statement->prepare("SELECT * from cliente");
        $statement->execute();
        $resultado = $statement->get_result();
        while ($registro = $resultado->fetch_assoc()) {//hay que modificar el array() y cambiarlo por el código adecuado
        echo "<tr>
            <td>".$registro['dni']." </td>
            <td>". $registro['nombre']." </td>
            <td>". $registro['direccion']." </td>
            <td>". $registro['telefono']." </td>
            <td>
              <a href=\"modificar.php?&dni=". $registro['dni'] ."&nombre=". $registro['nombre'] ."&direccion=". $registro['direccion'] . "&telefono=". $registro['telefono']." \">
                <button >Modificar</button>
              </a>
            </td>
            <td>
              <a href=\"index.php?accion=borrar&dni=". $registro['dni']."\">
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

  <br>
  <a href="cerrarsesion.php"><button>Cerrar sesion</button> </a>
</body>

</html>
<?php 
} else{
  print 'No has iniciado sesion';
  print '<br>';
  
  print '<a href="login.php"><button>Volver al login</button> </a>';
    }
?>