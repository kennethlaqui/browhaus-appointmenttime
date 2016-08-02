<!-- © Bootstrap by Azmind. Customized by VLI -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Browhaus Appointment Time</title>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<script src="js/angular.js"></script>
    <script src="js/angular-animate.js"></script>
    <script src="js/ui-bootstrap-tpls-1.3.3.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/timeselect.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style2.css">
	<!--<link rel="stylesheet" href="css/stylse.css">-->
	<link rel="stylesheet" href="css/form-elements.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/footer.css">
	<!-- js -->
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/jquery.js"></script>

	<!-- datepciker -->
	 <script src="js/bootstrap-datepicker.js"></script>
	 <link rel="stylesheet" href="css/datepicker.css">

</head>
<body >
<style type="text/css">
#eventForm .form-control-feedback {
    top: 0;
    right: -15px;
}gb l,humn
</style>

	<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Bootstrap Multi Step Registration Form Template</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								Put some text or
							</span> 
							<a href="#"><strong>links</strong></a> 
							<span class="li-text">
								here, or some icons: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="top-content">
        <div class="inner-bg">     
		<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text">
				<h1 class="strstrip">Browhaus</h1>
				<h1>Hey Brow Buddy!</h1>
				<div class="description">
					<h1>
						Welcome to your one-stop brow and lash grooming salon built for you, the image-conscious urbanite who demands not just function, but function and style.
					</h1>
				</div>
			</div>
        </div>
		<div class="row">
		<div class="col-sm-6 col-sm-offset-3 form-box style="margin-top: 100px;> 
			
		<form role="form" action="register.php" method="post"class="registration-form" enctype="application/x-www-form-urlencoded">
				
		<fieldset>
				<div class="form-top">
					<div class="form-top-left">
						<h3>Browhaus Appointment Time</h3>
					</div>
					<div class="form-top-right">
						<i class="fa fa-user"></i>
					</div>
		        </div>
				
	    <div class="form-bottom">
				<h3 style="margin-bottom: 25px; text-align: center;"></h3>
			
				<div class="form-group">
					<input type="text" maxlength="30" class="form-control" id="name" name="name" placeholder="Name" required>
				</div>
				<div class="form-group">
					<input type="text" maxlength="30" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>	
				<div class="form-group">
				<input type="text" maxlength="11" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
				</div>
				<div class="form-group">
					<input type="text" maxlength="8" class="form-control" id="telno" name="telno" placeholder="Tel. Number" required>
				</div>		
				<div class="form-group">
					<select id="getlocation" name="getlocation" class="form-control">
						<!-- To display all data from database going to this select form -->
						<?php
							require_once 'config.php';
					
							$stmt = $dbcon->prepare("SELECT * FROM c_locn_cde WHERE stor_nme='browhaus'");
							$stmt->execute();
							while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
								extract($row);
								?>
								<option value="<?php echo $locn_cde; ?>"><?php echo $locn_nme; ?></option>
								<?php
							}
						?>
					</select>
				</div>
				
				<script type="text/javascript">
				//select first the branches
					$(document).ready(function(){
						var date = new Date();
						date.setDate(date.getDate()-0);
						$('#apntdate').datepicker({startDate: date, autoclose:true}).on('changeDate',function(){
						var numericdayweek = $('#numericdayweek').val();
						var getlocation = $('#getlocation').val();
						var dataString = 'numericdayweek='+ numericdayweek + '&getlocation=' + getlocation;
							$.ajax({
								type: 'POST',
								url: 'getlocation.php',
								data: dataString,
								success: function(r)
							   {
								$("#display").html(r);
								console.log('success in numericdayweek '+numericdayweek);
								//alert('sucess in numericdayweek'+numericdayweek);
							   },
								error: function(){
									alert('failure');
								}
							});
						
						});
						$('#getlocation').on('change',function(){
						var numericdayweek = $('#numericdayweek').val();
						var getlocation = $('#getlocation').val();
						var dataString = 'numericdayweek='+ numericdayweek + '&getlocation=' + getlocation;
							$.ajax({
								type: 'POST',
								url: 'getlocation.php',
								data: dataString,
								success: function(r)
							   {
								$("#display").html(r);
								console.log('success in getlocation '+getlocation);
								//alert('sucess in numericdayweek'+numericdayweek);
							   },
								error: function(){
									alert('failure');
								}
							});
						
						});
					});
				</script> 				
				<div class="form-group">
					<input type="text" maxlength="20" class="form-control" id="therapist" name="therapist" placeholder="Therapist">
				</div>
				<div class="form-group">
					<input type="text" maxlength="20" class="form-control" id="treatment" name="treatment" placeholder="Treatment">
				</div>
				<div class="form-group">
					<input type="text" id="apntdate" name="apntdate" class="form-control" placeholder="Appointment Date">
				</div>
				<div id="form-group" >
				<!-- get the value of this -->
					<input type="text" id="dspldate" name="dspldate" class="form-control" placeholder="dspldate Date">
				</div>
				<div id="form-group" >
				<!-- display day of week. e.g. thursday -->
					<input type="text" id="dateday" name="dateday" class="form-control" placeholder="datenumber Date">
				</div>
				<div id="form-group" >
				<!-- numeric representation of day of week e.g thursday = 3 -->
					<input type="text" id="numericdayweek" name="numericdayweek" class="form-control" placeholder="datenumber Date">
				</div>
				<!--<div id="form-group" >
				<input type="text" id="duptime" name="duptime" class="form-control" placeholder="duptime Date">
				</div> -->
				<div class="form-group" id="display">
						<!-- Records will be displayed here/from branches -->
				</div>
				<div id="form-group" >
				<!-- display military time-->
					<input type="text" id="con_mil" name="con_mil" class="form-control" placeholder="mil_time" required>
				</div>
				<div id="form-group" >
				<!-- display standard time -->
					<input type="text" id="stdtime" name="stdtime" class="form-control" placeholder="stdtime" required>
				</div>
			<!--	<div id="form-group" >
				<!-- numeric representation of day of week e.g thursday = 3 
				<button type="button" id="clickme" name="clickme" class="form-control">Check available time...</button>
				</div> -->
				
				<script type="text/javascript">
					$(document).ready(function(){
						//fixed. 
						//do the trick
						//hide now the input text
						$('#dspldate').hide();
						$('#dateday').hide();
						$('#numericdayweek').hide();
						var date = new Date();
						date.setDate(date.getDate()-0);
						$('#apntdate').datepicker({ 
							startDate: date,
							 autoclose: true
						});
					$('#apntdate').change(function () {
						var eventDate = $('#apntdate').val();
						var dateElement = eventDate.split("/");
						var dateFormat = dateElement[2]+'-'+dateElement[0]+'-'+dateElement[1];
						var date = new Date(dateFormat+'T10:00:00Z'); 
						var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
						var numericday = ["0", "1", "2", "3", "4", "5", "6"];
						var day = weekday[date.getDay()];
						var numericres = numericday[date.getDay()];
						$('#apntdate').val($('#apntdate').val() + ' - ' + day);
							//$("#dspldate").html(eventDate);
							document.getElementById('dspldate').value = eventDate;	
							document.getElementById('dateday').value = day;	
							document.getElementById('numericdayweek').value = numericres;
										
							
						});
					
					
					});		
				</script>
				
				<script type="text/javascript">
			//default - when user click the getstd/time
					$(document).ready(function(){
						$('#con_mil').hide();
						$('#stdtime').hide();
						$(document).on('click',"select#getstd",function(){
						var valstd = $('#getstd').val();
						var valoption = $( "select#getstd option:selected").text();
						document.getElementById('con_mil').value = valstd;	
						document.getElementById('stdtime').value = valoption;	
						});
					});
				</script>
				
				<script type="text/javascript">
				//validation - if user click message. Execute again this function
					$(document).ready(function(){
						$('#con_mil').hide();
						$('#stdtime').hide();
						$('#msg').on('click', function(){
						var valstd = $('#getstd').val();
						var valoption = $( "select#getstd option:selected").text();
						document.getElementById('con_mil').value = valstd;	
						document.getElementById('stdtime').value = valoption;	
						});
					});
				</script>
				
				<script type="text/javascript">
				//validation - if user change location, execute again this function
					$(document).ready(function(){
						$('#con_mil').hide();
						$('#stdtime').hide();
						$('#getlocation').on('click', function(){
						var valstd = $('#getstd').val();
						var valoption = $( "select#getstd option:selected").text();
						document.getElementById('con_mil').value = valstd;	
						document.getElementById('stdtime').value = valoption;	
						});
					});
				</script>
				
				
			<div class ="form-group">
				</div>
				<div class="form-group">
				<textarea class="form-control" type="textarea" id="msg" name="msg" placeholder="Message" maxlength="140" rows="7"></textarea>
					<span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
				</div>
				<button type="submit" id="submit" name="register" value="register" class="btn btn-primary btn-next">Submit</button>
				</div>
		</fieldset>
		</form>
		</div>
		</div>
		</div>
		</div>
		</div>
		
	<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>
                    <p><br></p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Privacy Policy</h3>
                    <ul class="list-inline">
                        <!-- some social networks -->
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Terms and Conditions</h3>
                    <p></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Author <?php echo date("Y"); ?> V2
                </div>
            </div>
        </div>
    </div>
</footer>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/charleft.js"></script>
	<script src="js/jquery.backstretch.min.js"></script>
    <script src="js/retina-1.1.0.min.js"></script>
    <script src="js/scripts.js"></script>	
  </body>
</html>