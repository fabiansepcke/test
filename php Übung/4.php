<?php
$zahl=1;
while ($zahl <= 200):
	if ($zahl % 2 != 0) {
		echo $zahl;
	}
	$zahl++;
	echo " <br /> ";
endwhile;
?>