<?
    session_start();

if(isset($_SESSION['numero'])) {
    $_SESSION['numero']++;
} else {
    $_SESSION['numero'] = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contador de visitas</title>
</head>
<body>
    <h1>
    <?
    echo "Contador de visitas: " .$_SESSION['numero']
    ?>
    </h1>
</body>
</html>