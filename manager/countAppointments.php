<?php 

$con = mysqli_connect('localhost','root','','malakGroomingApp');

$sql = "SELECT * FROM timetable";

$result= mysqli_query($con,$sql);

$json = mysqli_num_rows($result);

echo json_encode($json);

?>