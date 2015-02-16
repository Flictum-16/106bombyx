<?php
	$error = 0;
	if (isset($_POST['Value_x'])) {
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
		
			<script type="text/javascript"> 
				var chart_bombyx;
				$(document).ready(function () {
					chart_bombyx = new Highcharts.Chart({
						<?php if (isset($_POST['Value_x']) && $error != 1) { ?>
						{ 
    						$('#chart').highcharts({
        						chart: 
        						{
        							renderTo: 'container',
            						type: 'scatter'
        						},
        						title: 
        						{
            						text: 'Courbe du nombre d\'individu en fonction de génération'
        						},
        						xAxis: 
        						{
        							min: 1.0,
									max: 4.0,
									title: 
									{
										text: 'k'
									}
        						},
        						yAxis: 
        						{
        							min: 0,
									title: 
									{
										text: 'Population de bombyx'
									}
        						},
        						series: [
        						{
            						name: 'Nbr_Bombyx',
									data: [ 
										<?php
										
										$min = $_POST['min'];
										$max = $_POST['max'];

										for ($k = 1.0; $k <= 4.0; $k += 0.01)
										{
											$x1 = 10;
											for ($i = 0; $i <= $max; $i++)
											{
												if ($i >= $min )
												{
													echo '['.$k;
													echo ', ';
													echo ($k * $x1 * ((1000 - $x1) / 1000));
													if ($i < $max)
														echo '], ';
													else
														echo ']';
												}
												$last = ($k * $x1 * ((1000 - $x1) / 1000));
											}
											if ($k < 4.0)
												echo ', ';
										}
										?>
									]
       							}]
       						<?php } 
       						else 
       						{ ?>
       						chart: 
       						{
								renderTo: 'container',
								type: 'line',
							},
							title: 
							{
								text: 'Courbe d\'évolution de la population de Bombyx'
							},
							xAxis: 
							{
								title: 
								{
									text: 'Bombyx'
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
										$x1 = 10;
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
											echo ($k * ($x1) * ((1000 - ($x1)) / 1000));
											if ($i > 2)
												$last = ($k * ($x1) * ((1000 - ($x1)) / 1000));
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
	</body>
</html>