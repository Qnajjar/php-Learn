<?php
output_code();
function output_code()
{
     # include('session.php');
      $username = "root";
       $password = "";
       $host = "localhost";
       $dbname = "testing";
   $conn = mysqli_connect($host, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	//echo "Connected successfully";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- <meta http-equiv="refresh" content="3" >-->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>AL-JAREED</title>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
        <link href="Admin.css" rel="stylesheet" type="text/css" />
        
</head>
<body onload="go(<?php //echo $_SESSION['link_Id']; ?>)">

<div id="header">
<div id="logo">
  <h1>
	<!--<a href="#">ALJAREED</a> -->
	<!--<a title="aljareed Co" href="#">-->
	<img class="png" alt="aljareed service" src="images/logo.png" ></img>
 </h1>
</div>
<h4  class="name" style="color: blue;"><?php echo $login_session; ?></h4>
<button class="one"  onclick="check()" style="float: right;">Logout</button>
</div>
<div id="sidebar"  style="overflow-y: scroll;">
<?php
$data=array();
$sql="SELECT id,name,Url FROM list";
$result = mysqli_query($conn,$sql)OR DIE (mysqli_error($conn));
while($row = mysqli_fetch_array($result) ) 
{

$data[] = $row;
}
?>
<?php //echo '<ul>';?>
  <?php foreach($data as $r=>$value) 
{  
	
?>
<button class="unique" id="is" onclick=go(<?php echo $value[0];?>)><?php echo $value[1]; ?></button>
 
<?php echo "</br>";?>
 <?php
 }
 ?>
</div>

<div id="content" class="loader" style="overflow-y: scroll;" >
</div>

</body>

<script language="JavaScript">
function go(id){
	var xmlhttp;
	 var page_id = id;
	 var link_Id;
	if(page_id != null && page_id !="" )
	{
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
	    xmlhttp.open("GET", "http://localhost/new/test.php?id="+id,true);
	    xmlhttp.send();
	    var refreshId = setInterval(function()
	    		{
	    		     $('#content').fadeOut("fast").load( "http://localhost/new/test.php?id="+id).fadeIn("fast");
	    		}, 10000);
	}
		}

function check()
{
var URL = window.location.host;

	  window.location="Default.php";
}

$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>

<?php
if(empty($_SESSION['login_user']))
{
	header("Location: Default.php");
	session_unset();
}
?>


