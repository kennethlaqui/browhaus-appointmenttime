<?php

	include('config.php');
	
	$getlocation = $_POST['getlocation'];
	$std = $_POST['std'];
	
	
	if($_POST['getlocation']){
		
		//get the day number 
		$stmt=$dbcon->prepare('SELECT mil_time FROM c_validtme WHERE locn_cde=:cid and day_numb=:daynumcode ORDER BY std_time');
		$stmt->execute(array(':cid'=>$getlocation, ':daynumcode'=>$std));
		
	}else{
		echo("error in post");
		
	}
	
	?>
	
	<?php
	if($stmt->rowCount() > 0){
		
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
	
			?>
			<div class="form-group">
			
			<select name="getmil" id="getmil" class="form-control">
				<?php foreach ($stmt as $row): ?>
				<option><?=$row["mil_time"]?></option>
				<?php endforeach ?>
				</select>
			</div>
			<?php		
		}
		
	}else{
		
		?>
       			<div class="form-group" >
			
			<select name="getmil" id="getmil" class="form-control">
				<?php foreach ($stmt as $row): ?>
				<option><?=$row["mil_time"]?></option>
				<?php endforeach ?>
				</select>
			</div>
        <?php		
	}
	
	
	?>
	