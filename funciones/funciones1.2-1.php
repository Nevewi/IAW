<?

function esPrimo($numero) {
    if ($numero < 2) {
        return false;
    }

    for ($i = 2; $i *$i <= $numero; $i++)
        if ($numero % $i == 0){
            return false;
        } 
    return true;
}

?>