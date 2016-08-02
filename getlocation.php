<?php

	include('config.php');
	
	$getlocation = $_POST['getlocation'];
	$numericdayweek = $_POST['numericdayweek'];
	
	
	if($_POST['getlocation']){
		
		//get the day number 
		$stmt=$dbcon->prepare('SELECT std_time, mil_time FROM c_validtme WHERE locn_cde=:cid and day_numb=:daynumcode ORDER BY dsplsort ASC');
		$stmt->execute(array(':cid'=>$getlocation, ':daynumcode'=>$numericdayweek));
		
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
			
			<select name="getstd" id="getstd" class="form-control">
				<?php foreach ($stmt as $row): ?>
				<option value="<?=$row["mil_time"]?>"><?=$row["std_time"]?></option>
				<?php endforeach ?>
				</select>
				
			</div>
			
			<?php		
		}
		
	}else{
		
		?>
       			<div class="form-group" >
			
			<select name="getstd" id="getstd" class="form-control">
				<?php foreach ($stmt as $row): ?>
				<option value="<?=$row["mil_time"]?>"><?=$row["std_time"]?></option>
				<?php endforeach ?>
				</select>
			</div>
        <?php		
	}
	
	
	?>
	