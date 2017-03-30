<? php

	$userEmail = $_POST['userEmail'];
	$userPwd = $_POST['userPassword'];
	
	if(!empty($userEmail) && !empty($userPwd)) {
		if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false){
			$sql = mysql_query("SELECT user_id, user_email FROM users WHERE user_email = '$userEmail' AND userPassword = '$userPwd'", $this->db);
			if(mysql_num_rows($sql) > 0){
				$result = mysql_fetch_array($sql,MYSQL_ASSOC);
				// If success, send user info
				$response = $result;
			}
			$response = "Sign In Failed";
		}
	}

	if(!$response){
		http_response_code(404);
		return false;
	}
	/*Return the data in JSON format*/
	return json_encode($response);

?>