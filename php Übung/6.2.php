<?php
$zahl = $_POST["zahl"];
if (strlen($zahl) <= 8) {
echo $zahl;
} else {
echo "Die maximale Länge von 8 wurde überschritten!";
}
?>