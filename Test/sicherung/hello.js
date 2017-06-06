
$(document).ready(function() {
    $.ajax({
        url: "http://localhost/index.php/"
    }).then(function(data) {
       $('.cocktails').append(data);
	   var json = JSON.parse(data);
	   var arrlength = json.length;
	   for (var i = 0; i < arrlength; i++) {
		var op = document.createElement('option');
		var txt = document.createTextNode(json[i]);
		op.setAttribute('title',json[i]);
		op.appendChild(txt);
		var Ausgabebereich = document.getElementById('C');
		  Ausgabebereich.appendChild(op);
			}
	   	});
			
});
	
