<?php
	
  
	
	if(isset($_POST['register']))
	{
		
	$serverName = "appointmentsrv.database.windows.net";
	//$serverName = "LAQUI\SQLEXPRESS";
	$connectionOptions = array("Database"=>"DBAppointment", 
	"Uid"=>"kennethlaqui", "PWD"=>"mAsterkkl082695");
	//"Uid"=>"vlilocalsql", "PWD"=>"mAsterkkl082695");
	
	$conn = sqlsrv_connect($serverName, $connectionOptions);
	
	if( $conn == false)  
	{  
		echo "Could not connect.\n";  
		die( print_r( sqlsrv_errors(), true));  
	}  
	if(!strstr($_POST['email'], '@')) //if email add don't have @
	{
		
		die('
			<script>
				alert("Please enter a valid Email Address");
				history.back();
			</script>
		');
	}
	
	
	

	require_once 'config.php';
									
	$stmt = $dbcon->prepare('SELECT MAX(cntrl_no) AS cntrl FROM c_appointm');
	$stmt->execute();
	
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$cntrlno = $row['cntrl'] + 1;
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$mobnum = $_POST["mobile"];
	$telno = $_POST["telno"];
	$therapist = $_POST["therapist"];
	$treatmnt = $_POST["treatment"];
	$apntdate = $_POST["dspldate"];
	$apnttime = $_POST["stdtime"];
	date_default_timezone_set('Asia/Manila');
	$today = date("m.d.y");
	$branch = $_POST["getlocation"];
	$msg = $_POST["msg"];
	$valstd = $_POST["con_mil"];
	$tsql = "INSERT INTO dbo.c_appointm (clnt_nme,
									     emailadr,
									     cel_numb,
									     tel_numb,
									     therapst,
									     treatmnt,
										 apnt_dte,
									     apnt_tme,
										 log_date,
										 locn_cde,
										 message_,
										 cntrl_no,
										 mil_time)
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
	$withparam = array($name, 
					   $email, 
					   $mobnum, 
					   $telno,
					   $therapist,
					   $treatmnt,
					   $apntdate,
					   $apnttime,
					   $today,
					   $branch,
					   $msg,
					   $cntrlno,
					   $valstd);
	$result = sqlsrv_query($conn, $tsql, $withparam);
	if( $result === false )  
	{  
     echo "Error in execution of INSERT.\n";  
     die( print_r( sqlsrv_errors(), true));  
	}  
	sqlsrv_close($conn);
	
	die('
					<script language="Javascript">
					alert("Thank you for making an appointment with us!");
					window.location="index.php";
					</script>		
					');
	}
		
?>