
	
window.onload = function () {
       
       var xx = httpGet("http://localhost/index.php/");
	 	     var json = JSON.parse(xx);
	   var arrlength = json.length;
	   alert(json.length);
	   for (var i = 0; i < arrlength; i++) {
		var op = document.createElement('option');
		var txt = document.createTextNode(json[i]);
		op.setAttribute('title',json[i]);
		op.appendChild(txt);
		var Ausgabebereich = document.getElementById('C');
		  Ausgabebereich.appendChild(op);
			}


	   }
	
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
function httpGetAsync(theUrl, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
}