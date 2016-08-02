<?php
	$serverName = "LAQUI\SQLEXPRESS";
	$connectionOptions = array("Database"=>"AdventureWorksLT2012", 
	"Uid"=>"vlilocalsql", "PWD"=>"mAsterkkl082695");
	
	$conn = sqlsrv_connect($serverName, $connectionOptions);
	
	if( $conn == false)  
{  
     echo "Could not connect.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
  
?>