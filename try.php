<?php

if (isset($_POST['id'])) {
	
	$data= 'southern';
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Trial</title>
</head>
<body>
<form>
		<div class="form-select" id="default-select"">
		<select onChange="window.location.href=this.value">
		    <option value="try.php?id=1">Southern</option>
		    <option value="try.php?id=2">Central</option>
		    <option value="try.php?id=3">Northern</option>
		    <option value="try.php?id=4">Eastern</option>
		</select>
		
	</div>
</form>

</body>
</html>