<?php
	$error = 0;
	if (isset($_POST['form2'])) {
		if (empty($_POST['min']) OR empty($_POST['max'])) {
			echo '<script type="text/javascript">alert("Une valeur est manquante.");</script>';
			$error = 1;
		}
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="button.css" />
		<title>106 bombyx !!</title>

		<script type="text/javascript"> </script>

	</head>
	<body>
	</body>
</html>