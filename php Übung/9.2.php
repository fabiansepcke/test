<?php
session_start();
$ses = $_POST["product"];
$_SESSION['produkte'][] = $ses;
  foreach($_SESSION['produkte'] as $element){
    echo $element;
	echo '<p></p>';
  }

?>
<a href="9.1.php">Weiter</a>
