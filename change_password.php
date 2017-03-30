<?php

	$changePassword = array();
	$changePassword['id'] = $_POST['userId'];
	$changePassword['password'] = $_POST['password'];

	$request_url = "localhost/MMFSite/user/changePassword";

	$postPassword = json_encode($changePassword);

	//Create cURL connection and set options
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_URL, $request_url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postPassword);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
    'Content-Length: ' . strlen($postPassword))
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