<form action="saluda.php" method="get">
    <input type="text" name="nombre">
    <input type="text" name="telefono">
    <input type="text" name="correo">
    <input type="submit" value="Enviar">
</form>
<?
if (
    isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['correo'])
) {
    $user = strtolower($_POST['usuario']);
    $telefono = ($_POST['telefono']);
    $correo = strtolower($_POST['correo']);


        if (
            is_numeric($telefono) && strlen($telefono)==9 && $telefono{0}>5 && $telefono{0}<7) {
            echo "La contraseña es correcta";
            } else {
                echo "La contraseña no es valida";
            }
        

        if (
            ctype_punct($user)) {
                echo "El usuario es valido";
            } else {
                echo "El usuario no es valido";
            }
        
        if (filter_var($correo)) {
                echo "El correo es valido";
            } else {
                echo "El correo no es vlaido";
            }
        
    }


?>