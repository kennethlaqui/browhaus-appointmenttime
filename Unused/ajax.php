<?php


	include('config.php');
	
	
$countryId = isset($_POST['countryId'])  ? $_POST['countryId'] : 0;
$stateId = isset($_POST['stateId'])  ? $_POST['stateId'] : 0;
$command = isset($_POST['get'])  ? $_POST['get'] : "";

switch($command){
case "country":
$statement = "SELECT id, name FROM country";
break;
case "state":
$statement = "SELECT id, name FROM state WHERE country_id=".(int)countryId;
break;
case "city":
$statement = "SELECT id, name FROM country WHERE state_id=".(int)stateId;
break;
default:
break;
}

$sth = $dbh->prepare($statement);
$sth->execute();
$result = $sth->fetchAll();

echo json_encode($result);
exit();
?>