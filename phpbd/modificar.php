<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
</head>

<body>
  <h1>Almacen</h1>
  <h2>Gestión de productos de Almacen</h2>
  <form action="index.php" action="GET">
    <input type="text" name="descripcion" value="<?= $_GET['descripcion'] ?>">
    <input type="text" name="precio" value="<?= $_GET['precio'] ?>">
    <input type="number" name="id" value="<?= $_GET['id'] ?>">
    <input type="hidden" name="accion" value="modificar">
    <br><br>
    <input type="submit" value="Aceptar">
    <a href="index.php">
      <button type="button">Cancelar</button>
    </a>
  </form>
</body>

</html>