  <?php
 
 $dz = mysqli_connect("localhost","Fabian","gnagflow","si_test");
  if (!$dz)
{
  exit();
}

$random = rand (10, 40);

$eintrag = "INSERT INTO Messwerte (Zeit, Wert) VALUES (NOW(), '$random')";
$eintragen = mysqli_query($dz, $eintrag);
mysqli_close($dz);
?>  