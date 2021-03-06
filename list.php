<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Weather Forecast</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			require_once('weather.php');
			$places = json_decode(file_get_contents("places.json"),true);
			$weather = new weather();
		?>
		<table>
			<tr>
				<th colspan="3"></th>
				<th>High</th>
				<th>Low</th>
			</tr>
		<?php
			foreach ($places as $key => $value) {
				$city = urlencode($value['city']);
				$region = $value['region'];
				$result = $weather->get_weather($city, $region)['query']['results']['channel']['item'];
				$image = 'http://l.yimg.com/a/i/us/we/52/' . $result['condition']['code'] . '.gif' ;
				$text = $result['condition']['text'];
				$low = $weather->convert_temp($result['forecast'][0]['low']);
				$high = $weather->convert_temp($result['forecast'][0]['high']);
		?>
			<tr>
				<td><a href="view.php?c=<?php echo $city;?>&r=<?php echo $region;?>"><?php echo str_replace("+", " " ,$city); ?></a></td>
				<td><img src="<?php echo $image;?>"></td>
				<td><?php echo $text; ?></td>
				<td><?php echo $high; ?></td>
				<td><?php echo $low; ?></td>
			</tr>
		<?php
			}
		?>
		</table>	
	</body>
</html>