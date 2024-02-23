<?

include 'funciones1.2-1.php';
echo "Numeros primos entre 1 y 1000:\n";

$num = 1;
while ($num > 0 && $num < 1001){ 
    if (esPrimo($num)){
        echo $num . "<br>";
    }
    $num++;


}

?>