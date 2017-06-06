<?php
$original = "hallo welt";
echo $original;
echo " <br /> ";
$orig_gr = strtoupper($original);
echo $orig_gr;
echo " <br /> ";
$parts = explode(" ", $original);
$agr1 = ucfirst ($parts[0]);
$agr2 = ucfirst ($parts[1]);
echo $agr1." ".$agr2;
echo " <br /> ";
echo strlen($original);
?>