var json;
var arrlength;
var Cocktail;
// Funktion beim Laden; Empfängt GET Alle Zutaten, Baut Tabelle auf. 
$(document).ready(function() {
	var x = location.search;
	var y = x.substring(3);
	Cocktail = y.replace("+"," ");
	var urli = "http://169.254.206.114/index.php/";
    $.ajax({
        url: urli + Cocktail
    }).then(function(data) {
	   json = JSON.parse(data);
	   arrlength = json.length;
	   for (var i = 0; i < arrlength; i++) {
		var t1 = document.createElement('tr');
		var div = document.createElement('td');
		var txt = document.createTextNode(json[i]);
		var div2 = document.createElement('input');
		var x1 = div2.setAttribute("type", "button");
		var x2 = div2.setAttribute("onclick", "gZahl("+i+")");
		var div3 = document.createElement("textarea");
		var x3 = div3.setAttribute("id", i);
		div.appendChild(txt);
		t1.appendChild(div);
		t1.appendChild(div2);
		t1.appendChild(div3);
		var Ausgabebereich = document.getElementById('C');
		  Ausgabebereich.appendChild(t1);
		}
		});
});
// REST POST API; Sendet JSON(Cocktail, Zutaten, Werte):
function validate() {
	json2 = JSON.stringify(json);
	alert(json2);
	xmlhttp = new XMLHttpRequest();
	var url = "http://169.254.206.114/index.php/insert/";
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/json");
	xmlhttp.onreadystatechange = function () { //Call a function when the state changes.
	var resp;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById('Nummer').innerHTML = "Cocktailnummer: " + xmlhttp.responseText;
		}
}
	xmlhttp.send(json2);
}
// Temperatur wird gemessen; Fügt Tempwert und Name des Cocktails an JSON Array an:
function temp() {
	var z1 = document.getElementById("tempanzeige");
	z1.value = Math.floor((Math.random() * 60) + 1);
	json.push(z1.value);
	json.push(Cocktail);
		
}
// Gewicht wird gemessen und in JSON Array geschrieben: 
function gZahl(i) {
	var z1 = document.getElementById(i);
	z1.value = Math.floor((Math.random() * 60) + 1);;
	json[i][1] = z1.value;
	}
	