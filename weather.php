<?php
	/**
	* Retreive from Yahoo Weather api for weather information for cities
	*/
	class weather{
		function get_weather($place, $region){
			$url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22" . $place . "," . $region . "%E2%80%8B%22)&format=json";
			$curl = 		 curl_init($url);
							 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);
							 curl_close($curl);
			$decoded = json_decode($curl_response, true);
			return $decoded;
		}
	}
?>