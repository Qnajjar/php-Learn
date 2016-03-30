<?php 
session_start();

      $username = "root";
       $password = "";
       $host = "localhost";
       $dbname = "testing";
   $conn = mysqli_connect($host, $username, $password,$dbname);
   
$Id=@$_GET['id'];
//$link_Id;
 $_SESSION['link_Id']=$Id;
  $sql="SELECT Url FROM list where id='$Id'";

$result = mysqli_query($conn,$sql)OR DIE (mysqli_error($conn));
while($row = mysqli_fetch_array($result) )
{

$url=$row['Url'];
	
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
$response=curl_exec($ch);
//session_unset($_SESSION['link_Id']);
//echo  $response;
// close cURL resource, and free up system resources

curl_close($ch);
}


class session{
public static function clear_all()
{
self::current_session()->inst_clearAll()	;
self::$default_session=null;
	
}
}


?>

