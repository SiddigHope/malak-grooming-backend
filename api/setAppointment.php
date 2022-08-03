<?php 

include "connection.php";

if(isset($_GET['pet'])){

    $user = $_GET['user'];
    $day = $_GET['day'];
    $hour = $_GET['hour'];
    $pet = $_GET['pet'];
    $phone = $_GET['phone'];
    $token = $_GET['token'];
    $type = $_GET['type'];
    $serviceType = $_GET['serviceType'];
    $aggressive = $_GET['aggressive'];

    $sql = "INSERT INTO timetable (user, day, hour, pet, phone, type, serviceType, aggressive, token)
            VALUES ('$user', '$day', '$hour', '$pet', '$phone', '$type', '$serviceType', '$aggressive', '$token')";
    $result = $mysqli->query($sql) or die($mysqli->error);
 
    if ($result) {
        echo json_encode([
            "message" => "RECORD_INSERTED"
        ]);
    } else {
        echo json_encode([
            "message" => "RECORD_NOT_INSERTED"
        ]);
    }
}else{
    die("401 UNAUTHORIZED");
}

$mysqli->close();

?>