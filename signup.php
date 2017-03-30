<?php

	$userInfo = array();
	$userInfo['username'] = $_POST['username'];
	$userInfo['password'] = $_POST['password'];
	$userInfo['email'] = $_POST['email'];

	$request_url = "localhost/MMFSite/user/signup";

	$postFields = json_encode($userInfo);

	//Create cURL connection and set options
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($curl, CURLOPT_URL, $request_url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
    'Content-Length: ' . strlen($postFields))
	);
	//Execute cURL
	$response = curl_exec($curl);

	//Check for errors
	$errorMessage = curl_exec($curl);
	echo $errorMessage;
	curl_clost($curl);
	
	/*Return the data in JSON format*/
	return json_encode($response);

?>