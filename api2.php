<?php 
    if (isset($_POST['submit']))
	{
		$base = $_POST['base'];
		$amt = $_POST['amount'];

		$curl=curl_init();
		curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1,CURLOPT_URL => "https://api.fixer.io/latest?base=$base" ));
		$resp=curl_exec($curl);
		$response_array = json_decode($resp,true);
		$result = $amt * $response_array['rates']['USD'];
		print_r($result);
		curl_close($curl);
	}
?>