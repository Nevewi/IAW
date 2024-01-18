<?
if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {
echo
"Son " .$_GET["numero"] / 1.09;
} else {
    echo "No escribiste nada";
}

?>