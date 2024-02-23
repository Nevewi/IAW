<?

include 'funciones4.php';
echo "El array es:\n";

$array = generaArray(5);

$min = minimoArray($array);

$max = maximoArray($array);

echo implode(", ",$array);
echo "<br>El minimo es ".$min." y el maximo es ". $max;


?>