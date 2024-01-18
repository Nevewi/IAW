<?
if (isset($_GET["numero1"]) && isset($_GET["numero2"]) 
&& is_numeric($_GET["numero1"]) && is_numeric($_GET["numero2"])) {

    $operacion = $_GET["numero3"];
    switch ($operacion) {
        case "+":
            echo "Suma: " .$_GET["numero1"] + $_GET["numero2"];
            break;
        case "-":
            echo "Resta: " .$_GET["numero1"] - $_GET["numero2"];
            break;
        case "*":
            echo "Multiplicacion: " .$_GET["numero1"] * $_GET["numero2"];
            break;
        case "/":
            if ($_GET["numero2"] != 0)
                echo "Division: " .$_GET["numero1"] / $_GET["numero2"];
            else
                echo "ERROR, no se puede dividir entre 0";
            break;
        default:
        echo "ERROR";
    }
}
?>