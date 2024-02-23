<?

include 'funciones4.php';
echo "El array es:\n";

$array = generaArray(5);

$max = maximoArray($array);

echo implode(", ",$array);
echo "<br>El maximo es ". $max;


?>