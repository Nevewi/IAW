<?php
/**
 * Dados2.php
 *
 * @author Jesus Lopez Fernandez
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Dado más alto. Juego.
    if .. elseif ... else ... (1). Sin formularios.
    Jesus Lopez Fernandez
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Juego: Dado más alto</h1>

  <p>Actualice la página para mostrar una nueva tirada</p>

  <table>
    <tr>
      <th>Jugador 1</th>
      <th>Jugador 2</th>
      <th>Resultado</th>
    </tr>
    <tr>


    
<?php


  $dado1 = rand(1,6);
  $dado2 = rand(1,6);

  
print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";

?>
    </tr>
  </table>

  <footer>
    <p>Jesus Lopez Fernandez</p>
  </footer>
</body>
</html>
