<?php 

include "connection.php";

$sql = "SELECT * FROM images ";
 
$result = $mysqli->query($sql);
 
if ($result->num_rows >0) {

	while ($row[] = $result->fetch_assoc()) {
		$tem = $row;
 		$json = json_encode($tem);
	}
} else {
 echo json_encode([
     "message" => "No Results Found"
 ]);
}
	echo $json;

$mysqli->close();

?>