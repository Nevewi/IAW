<?
if (isset($_POST["numero1"],$_POST["numero2"] )) {
echo
"Resultado: " .$_POST["numero1"] * $_POST["numero2"];
} else {
    echo "No escribiste nada";
}

?>