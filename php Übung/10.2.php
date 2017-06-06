 <?php
  $pro = $_POST["product"];
  $eintrag = "INSERT INTO pr (Name) VALUES ('$pro')";
  
  $dz = mysqli_connect("localhost","Fabian","gnagflow","produkte");
  if (!$dz)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
$eintragen = mysqli_query($dz, $eintrag);
$abfrage = "SELECT * FROM pr";
$ergebnis = mysqli_query($dz, $abfrage);

echo '<p></p>';
echo "<b>Einträge in Datenbank Produkte: </b> ";
echo '<p></p>';
while($row = mysqli_fetch_object($ergebnis))
{
  echo $row->Name;
  echo "<br />";
}
?>  
<br />
<a href="10.1.php">Weiter</a>