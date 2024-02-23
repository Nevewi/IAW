<?

include 'funciones1.php';
echo "Numeros capicua:\n";

$num = 1;
while ($num > 0 && $num < 100000){ 
    if (esCapicua($num)){
        echo $num . "<br>";
    }
    $num++;


}

?>