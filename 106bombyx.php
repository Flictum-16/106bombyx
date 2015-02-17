<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="button.css" />
		<title>106 bombyx !!</title>
		<?php
			$error = 0;
			if (isset($_POST['Value_i'])) {
				if (empty($_POST['min']) OR empty($_POST['max'])) {
					echo '<script type="text/javascript">alert("Une valeur est manquante.");</script>';
					$error = 1;
				}
			}
		?>
		<script type="text/javascript"> 
			var chart_bombyx;
			$(document).ready(function () {
				chart_bombyx = new Highcharts.Chart({
					<?php if (isset($_POST['Value_i']) && $error != 1) { ?>
        				chart: 
        				{
        					renderTo: 'container',
           					type: 'scatter'
        				},
        				title: {
           					text: 'Courbe du nombre d\'individu en fonction du taux de croissance'
        				},
        				xAxis: 
        				{
        					min: 1.0,
							max: 4.0,
							title: {
								text: 'k'
							}
        				},
        				yAxis: 
        				{
        					min: 0,
							title: {
								text: 'Population de bombyx'
							}
        				},
        				series: [{
           					name: 'Nbr_Bombyx',
							data: [ 
								<?php
									for ($k = 1.0; $k <= 4.0; $k += 0.01)
									{
										$x1 = 10;
										for ($i = 0; $i <= $_POST['max']; $i++)
										{
											if ($i >= $_POST['min'])
											{
												echo '['.$k;
												echo ', ';
												echo ($k * $x1 * ((1000 - $x1) / 1000));
												if ($i < $_POST['max'])
													echo '], ';
												else
													echo ']';
											}
											$x1 = ($k * $x1 * ((1000 - $x1) / 1000));
										}
										if ($k < 4.0)
											echo ', ';
									}
								?>
							]
       					}]
       					<?php } else { ?>
       					chart: 
       					{
							renderTo: 'container',
							type: 'line',
						},
						title: 
						{
							text: 'Courbe du nombre d\'individu en fonction du nombre de génération'
						},
						xAxis: 
						{
							title: 
							{
								text: 'Génération'
							}
						},
						yAxis: 
						{
							min: 0,
							title: 
							{
								text: 'Nombre de Bombyx'
							}
						},
						series: [{
							name: 'Bombyx',
							data: [ 10, 
								<?php
									$x = 10;
									if (isset($_POST['form']) AND !empty($_POST['nbk'])) 
									{
										$k = $_POST['nbk'];
									} 
									else 
									{ 
										$k = 2.9; 
									}
									for ($i = 2; $i <= 100; $i++) 
									{
										echo ($k * ($x) * ((1000 - ($x)) / 1000));
										if ($i > 2)
											$x = ($k * ($x) * ((1000 - ($x)) / 1000));
										if ($i < 100)
											echo ', ';
									}
								?>
							]
						}]
						<?php } ?>
    				});
				});
		</script>
	</head>

	<body>

		<h1>Mathématiques: Projet 106bombyx</h1>

		<table style="margin-left:33%;">
			<tr>
				<form method="post" action="">
					<td>
						Taux de croissance k : <input type="text" name="nbk" <?php if (!isset($_POST['Value_i']) || $error == 1) { echo 'value="'.$k.'"'; } ?> />
					</td>
			</tr>
			<tr>
					<td><input type="submit" name="form" value="Calculer" /></td>
				</form>
			</tr>
		</table>

		<table>
			<tr>
				<form method="post" action="">
					<td>
						Valeur i min : <input type="text" name="min" <?php if (isset($_POST['Value_i'])) { echo 'value="'.$_POST['min'].'"'; } ?> />
					</td>
			</tr>
			<tr>
					<td>
						Valeur i max : <input type="text" name="max" <?php if (isset($_POST['Value_i'])) { echo 'value="'.$_POST['max'].'"'; } ?> />
					</td>
			</tr>
			<tr>
					<td><input type="submit" name="Value_i" value="Calculer" /></td>
				</form>
			</tr>
		</table>

		<div style="height:200px;"></div>
		
		<center>
			<div id="container" style="width: 90%; height: 700px;"></div>
		</center>

	</body>
</html>