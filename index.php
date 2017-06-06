<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
echo("http://stackoverflow.com/questions/12542770/jquerydocument-ready-does-not-fire");
$app = new \Slim\App;
// GET Alle Cocktails:
$app->get('/', 'getCocktails'); 
// POST JSON(Cocktail, Zutaten und Werte):
$app->post("/insert/", function ($request, $response) {
    $data = $request->getParsedBody();
	$dz = mysqli_connect("localhost","Fabian","gnagflow","raspberry");
	$dz->set_charset("utf8");
	if (!$dz)
	{
	exit();
	}
	//Nummer vergeben:
		$ab2 = "SELECT (Nummer) FROM daten ORDER BY id DESC LIMIT 1";
		$erg2 = mysqli_query($dz, $ab2);
		$row1 = mysqli_fetch_row($erg2);
		$newNumber;
		if (strlen($row1[0]) !== 0){
			if ($row1[0] < 100) {
				$newNumber = $row1[0]+1;
			} else {
				$newNumber = 1;
			}
			$newNumber = $row1[0]+1;
		} else {
			$newNumber = 1;
		}
	//Response (Nummer) an  Client senden:
		$res = $response->write($newNumber);
	//JSON encoden:	
		$z1 = json_encode($data, true); 
		$z2 = json_decode($z1);
	//JSON Array verarbeiten (Temperatur und Name werden aus Array ausgelesen und entfernt):
		$id = array_pop($z2);
		$temp = array_pop($z2);
	//Daten, Temperatur einfügen:	
		$ab3= "INSERT INTO daten (FK_Cocktail, Temperatur, Nummer) SELECT id, ".$temp.", ".$newNumber." FROM cocktails WHERE name = '".$id."'";
		$erg3 = mysqli_query($dz, $ab3);
	//ID der gerade eingefügten Daten auslesen:
		$ab4 = "SELECT ID FROM daten ORDER BY ID DESC LIMIT 1";
		$erg4 = mysqli_query($dz, $ab4);
		$row = mysqli_fetch_row($erg4);
	// Gewicht einfügen:
		 for ($i = 0; $i < sizeof($z2); $i++)
		{
		$ab5 = "INSERT INTO gewicht (FK_Zutaten, FK_Daten, Wert) SELECT ID, ".$row[0].", ".$z2[$i][1]." FROM zutaten WHERE Name ='".$z2[$i][0]."'";
		$erg5 = mysqli_query($dz, $ab5);
		}
	//Test TXT erstellen:
		$myfile = fopen("json.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $z1);
		fclose($myfile);
	mysqli_close($dz);
});
//GET Alle Zutaten:
$app->get('/{name}', function($request) use ($app){
$neu = $request->getAttribute('name');
$dz = mysqli_connect("localhost","Fabian","gnagflow","raspberry");
$dz->set_charset("utf8");
  if (!$dz)
{
  exit();
}
$abfrage = "SELECT ID FROM Cocktails WHERE NAME = '" . $neu . "'";
$ergebnis = mysqli_query($dz, $abfrage);
$row = mysqli_fetch_row($ergebnis);
$ab1 = "SELECT zutaten.Name FROM zutaten INNER JOIN Cocktail_Zutaten ON ID = Z_ID INNER JOIN Cocktails ON cocktail_zutaten.C_ID = cocktails.ID WHERE cocktails.ID = " . $row[0];
$erg1 = mysqli_query($dz, $ab1);
$r=mysqli_fetch_all($erg1);
mysqli_close($dz);
echo json_encode($r);
});
$app->run();
// GET Alle Cocktails:
function getCocktails() {
$dz = mysqli_connect("localhost","Fabian","gnagflow","raspberry");
$dz->set_charset("utf8");
  if (!$dz)
{
  exit();
}
$abfrage = "SELECT Name FROM Cocktails";
$ergebnis = mysqli_query($dz, $abfrage);
$row = mysqli_fetch_all($ergebnis);
mysqli_close($dz);
echo json_encode($row);
}
