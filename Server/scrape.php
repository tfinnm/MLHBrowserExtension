<?php
	$data = getData('https://devpost.com/software', '', "GET");
	$xml = xml_parse($data);
	print($xml);
	function getData($url, $body, $type = "POST", $token = "") {
		$curl = curl_init();
		$headers = array(
			'Authorization: Bearer '.$token.'',
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'LetMeSleep/1');
		curl_setopt($curl, CURLOPT_AUTOREFERER, true); //we don't really need this
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 180);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

		$html = curl_exec($curl);
		if(curl_error($curl)) {
			echo "ERROR ERROR ERROR<br>";
			echo curl_error($curl);
		}
		curl_close($curl);

		return $html;
	}
?>