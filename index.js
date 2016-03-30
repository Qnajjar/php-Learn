///$('.toggle').on('click', function() {
  //$('.container').stop().addClass('active');
//});

//$('.close').on('click', function() {
  //$('.container').stop().removeClass('active');
//});

function go(url){
	var xmlhttp;
	if (window.XMLHttpRequest) {
	    xmlhttp = new XMLHttpRequest();
	} else {
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            document.getElementById('content').innerHTML=xmlhttp.responseText;
	        }
	    }
        
	    xmlhttp.open("GET", "http://localhost/new/test.php?url="+encodeURIComponent(url),true);
	    xmlhttp.send();
	}