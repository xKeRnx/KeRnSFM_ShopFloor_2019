function goto(sVal)
{
	window.location = ""+sVal;
}


function logout()
{
	var xmlHttp7 = new XMLHttpRequest();
	if (xmlHttp7 == null)
		{
			alert("Browser does not support HTTP Request");
			return;
		}
	var url = "../ins/logout.php";
	xmlHttp7.open("POST", url, true);
	xmlHttp7.send(null);
	xmlHttp7.onload = function() {
		var msg = xmlHttp7.responseText;
		if (msg == "error"){
			alert("Unknown Error");
			window.location = "../";
		}else{
			var str = window.location.href;
			str = str.replace("#", "");
			window.location = str;
		}
	}		
}

// function to trim strings
function trim(sVal)
{
	var sTrimmed = "";

	for (i = 0; i < sVal.length; i++)
	{
		if (sVal.charAt(i) != " " && sVal.charAt(i) != "\f" && sVal.charAt(i) != "\n" && sVal.charAt(i) != "\r" && sVal.charAt(i) != "\t")
		{
			sTrimmed = sTrimmed + sVal.charAt(i);
		}
	}

	return sTrimmed;
}	

function escapeOutput(toOutput){
	return toOutput.replace(/\&/g, '&amp;')
		.replace(/\</g, '&lt;')
		.replace(/\>/g, '&gt;')
		.replace(/\"/g, '&quot;')
		.replace(/\'/g, '&#x27')
		.replace(/\//g, '&#x2F');
}