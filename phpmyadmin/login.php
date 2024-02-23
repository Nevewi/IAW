<?
session_start(); 
if(isset($_POST['usuario']) && (isset($_POST['password']))){
    $usuario = strtolower($_POST['usuario']);
    $password= hash('sha512',$_POST['password']);
//conectar con la bd
//iniciar el stament
//preparar la consulta
//bindear los parametros
//executamos la consulta
//obtenemos los resultados
    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = 'usuarios';
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Error de conexion: " .$conn->connect_error);
        }
        $statement = $conn->stmt_init();
        $statement->prepare('SELECT $dbUsername, $dbPassword FROM usuarios 
        WHERE usuario = root and contraseña = test LIMIT 1');
        $statement->bind_param('ss', $user, $password);
        $statement->execute();
        $resultado = $statement->get_result();
    //si el numero de filas es mayor de 0, existe ese usuario en BD y voy 
    //a guardar su $usuario en la sesión y le voy a dejar entrar a contenido.php
        if ($resultado->num_rows > 0) {
        } else {
            $insertStatement = $conn->prepare('INSERT INTO usuarios(usuario, 
            password) values (?, ?)');
            $insertStatement->bind_param('ss', $user, $password);
            $insertStatement->execute();
            $insertStatement->close();
        }
            $statement->close();
            $conn->close();
        } catch (Exception $e) {

        }
        if ($usuario == "test" && $password == hash('sha512',"test")) {
            $_SESSION['username'] = $usuario;
            header("Location: contenido.php");
        } else {
            header("Location: index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

</head>
<body>
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">

    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Aceptar">
    </form>

    <p>¿No tienes cuenta?</p>
    <a href="registro.php">Registrate</a>
</body>
</html>