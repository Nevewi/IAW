<?
function clienteExiste($dni)
            {
                global $conn;
                $query = "SELECT dni FROM cliente WHERE dni = '$dni'";
                $result = mysqli_query($conn, $query);
                return mysqli_num_rows($result) > 0;
            }
            
function darDeAltaCliente($conn, $dni, $nombre, $direccion, $telefono) {
    $statement = $conn->prepare('INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)');
    $statement->bind_param('ssss', $dni, $nombre, $direccion, $telefono);
    $statement->execute();
}

function borrarCliente($conn, $dniborrar) {
    $statement = $conn->prepare('DELETE FROM cliente WHERE dni = ?');
    $statement->bind_param('s', $dniborrar);
    $statement->execute();
}

function modificarCliente($conn, $dninuevo, $nombrenuevo, $direccionnuevo, $telefononuevo, $dniviejo) {
    $statement = $conn->prepare("UPDATE cliente SET dni = ?, nombre = ?, direccion = ?, telefono = ? WHERE dni = ?");
    $statement->bind_param("sssss", $dninuevo, $nombrenuevo, $direccionnuevo, $telefononuevo, $dniviejo);
    $statement->execute();
}

function existeDni($conn, $dni) {
    $statement = $conn->prepare('SELECT dni FROM cliente WHERE dni = ?');
    $statement->bind_param('s', $dni);
    $statement->execute();
    $tabla_dni = $statement->get_result();
    return $tabla_dni->num_rows > 0;
  }
?>