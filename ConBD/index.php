<?
$conn = mysqli_connect('db', 'root', 'test', 'Banco');
//aquí se comprueba si el usuario ha insertado un username y password
//utiliza la función hash('sha512',$password) para cifrar la contraseña
//si el username es test y la password cifrada coincide con el hash('sha512',"test")
//se trata de un usuario válido y debemos proceder a guardar el username en la sesión 
//y posteriormente usar la función header("Location: contenido.php"); para acceder
//a la parte privada de la aplicación
//Si el username y contraseña no coincide con test/test usaremos la función header
//header("Location: index.php"); para ir a la parte pública de la aplicación
$statement = $conn->stmt_init();
$statement->prepare('SELECT * FROM usuarios WHERE usuario = ?');

//Dar de alta a un cliente
if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {

}

//Modificar un cliente
if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {

}
$statement->bind_param('s', $user);

$statement->bind_param(':nombreUsuario', $user);

$statement->execute();

$resultado = $statement->get_result();

















$consulta
?>

<table>
    <tr>
        <td>DNI</td><td>Nombre</td><td>Direccion</td><td>Telefono</td>
    </tr>
</table>

<?

