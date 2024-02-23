<?

function esCapicua($numero){

    if (isset($numero) && is_numeric($numero)){
        if ($numero == strrev($numero)) {
            return true;
        } else {
            return false;
        }
    } else {
      return false;
    }
}



?>
