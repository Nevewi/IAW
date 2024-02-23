<?
if (
    isset($_POST['usuario']) && isset($_POST['password'])
    && isset($_POST['password2'])
) {
    $user = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    if ($password == $password2) {
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
            $statement->prepare('SELECT * FROM usuarios WHERE usuario= ? LIMIT 1');
            $statement->bind_param('s', $user);
            $statement->execute();
            $resultado = $statement->get_result();

            if ($resultado->num_rows > 0) {

            } else {
                $insertStatement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (?, ?)');
                $insertStatement->bind_param('ss', $user, $password);
                $insertStatement->execute();
                $insertStatement->close();
            }
            $statement->close();
            $conn->close();
        } catch (Exception $e) {

        }
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <form>

    </form>
</body>

</html>