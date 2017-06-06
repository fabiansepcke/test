 <?php
  $Nummer = $_POST["Nummer"];
  $Note = $_POST["Note"];
  $dz = mysqli_connect("localhost","Fabian","gnagflow","raspberry");
		if (!$dz)
		{
		exit();
		}
	// Note in DB schreiben:	
	$ab ="SELECT ID FROM Daten WHERE Note IS NULL AND Nummer=".$Nummer."";	
	$erg = mysqli_query($dz, $ab);
	$row = mysqli_fetch_row($erg);
	$ab1= "UPDATE Daten SET Note=".$Note." WHERE Note IS NULL AND Nummer=".$Nummer."";
	// Ausgabe der gesamten Cocktail Informationen:
	$erg1 = mysqli_query($dz, $ab1);
	$ab2 = "SELECT Name FROM cocktails INNER JOIN Daten ON cocktails.ID = daten.FK_Cocktail WHERE daten.ID=".$row[0]."";
	$erg2 = mysqli_query($dz, $ab2);
	$row2 = mysqli_fetch_row($erg2);
	$ab3 = "SELECT zutaten.Name FROM zutaten INNER JOIN Cocktail_Zutaten ON Zutaten.ID = Cocktail_Zutaten.Z_ID INNER JOIN Cocktails ON cocktail_zutaten.C_ID = cocktails.ID WHERE cocktails.Name ='".$row2[0]."'";
	$erg3 = mysqli_query($dz, $ab3);
	$row3 = mysqli_fetch_all($erg3);dasd
	$ab4 = "SELECT Gewicht.Wert FROM Gewicht WHERE FK_Daten = ".$row[0]."";
	$erg4 = mysqli_query($dz, $ab4);
	$row4 = mysqli_fetch_all($erg4);
	mysqli_close($dz);
	echo("Note erfolgreich eingespeicherasft. Zusammenfassung: ");
	echo '<p></p>';
	echo '<p></p>';
	echo "Cocktail: ".$row2[0]."\n";
	echo '<p></p>';
	echo("Note: ".$Note);afd
	echo '<p></p>';
	for ($i = 0; $i < sizeof($row3); $i++)
		{
		echo($row3[$i][0].":    ".$row4[$i][0]." g");
		echo '<p></p>';	
		}
?>  