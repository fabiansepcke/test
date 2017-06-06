<?php
$zahl=1;
$bla=0;
while ($zahl <= 500000000):
		$bla = $bla + $zahl;
$zahl++;
endwhile;
echo $bla;
?>