<?php 

$mysqli = new mysqli("localhost", "root", "","malakGroomingApp");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}else{
    // echo "connected";
}
$mysqli->set_charset('utf8');
// $_POST['teacherId'] = '1197318010139900';

if(empty($_SERVER['CONTENT_TYPE']))
{ 
 $_SERVER['CONTENT_TYPE'] = "application/json"; 
}

// echo $_SERVER['CONTENT_TYPE']
?>