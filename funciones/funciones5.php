<?

include 'funciones4.php';
echo "El array es:\n";

$array = generaArray(10);

$min = minimoArray($array);


echo implode(", ",$array);
echo "<br>El minimo es ".$min;


?>