<?php
	//$serverName = "appointmentsrv.database.windows.net";
	$serverName = "LAQUI\SQLEXPRESS";
	$connectionOptions = array("Database"=>"DBAppointment", 
	//"Uid"=>"kennethlaqui", "PWD"=>"mAsterkkl082695");
	"Uid"=>"vlilocalsql", "PWD"=>"mAsterkkl082695");
	
	$conn = sqlsrv_connect($serverName, $connectionOptions);
	
?>

