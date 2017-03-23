<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_GET['c'];?> 5-Days-Weather Forecast</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			require_once('weather.php');
			$weather = new weather();
		?>
		<table>
			<tr>
				<th colspan="3"></th>
				<th>High</th>
				<th>Low</th>
			</tr>
		<?php
			$result = $weather->get_weather(urlencode($_GET['c']), urlencode($_GET['r']));
			$forecast = $result['query']['results']['channel']['item']['forecast'];
			for ($i=0; $i < 5; $i++) { 
				$value = $forecast[$i];
				$date = $value['date'];
				$image = 'http://l.yimg.com/a/i/us/we/52/' . $value['code'] . '.gif' ;
				$text = $value['text'];
				$low = $weather->convert_temp($value['low']);
				$high = $weather->convert_temp($value['high']);
		?>
			<tr>
				<td><?php echo $date; ?></td>
				<td><img src="<?php echo $image;?>"></td>
				<td><?php echo $text; ?></td>
				<td><?php echo $high; ?></td>
				<td><?php echo $low; ?></td>
			</tr>
		<?php } ?>
		</table>
		<a href="list.php">Back</a>
	</body>
</html>