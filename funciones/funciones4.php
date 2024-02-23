<?

function generaArray($n) {
    $array = array();
    for ($i = 0; $i < $n; $i++) {
      $array[] = rand(0, 100);
    }
    return $array;
}

function minimoArray($array) {
    return min($array);
  }

  function maximoArray($array) {
    return max($array);
  }

  

?>