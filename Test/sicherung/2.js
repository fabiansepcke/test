var json;
var arrlength;

$(document).ready(function() {
	var x = location.search;
	var y = x.substring(3);
	var z = y.replace("+"," ");
	var urli = "http://localhost/index.php/";
	
    $.ajax({
        url: urli + z
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


function validate() {
	json2 = JSON.stringify(json);
	alert(json2);
	xmlhttp = new XMLHttpRequest();
	var url = "http://localhost/index.php/insert/";
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/json");
	xmlhttp.onreadystatechange = function () { //Call a function when the state changes.
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        alert(xmlhttp.responseText);
		}
}
	xmlhttp.send(json2);
}


function temp() {
	var z1 = document.getElementById("tempanzeige");
	z1.value = Math.floor((Math.random() * 60) + 1);
	json.push(z1.value);
}

function gZahl(i) {
	var z1 = document.getElementById(i);
	z1.value = Math.floor((Math.random() * 60) + 1);;
	json[i][1] = z1.value;
	}
	