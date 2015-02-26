<?php 
	$user = $array = array('email' => "lol", 'pass' => "123");
	function credentials_valid($email, $pass){
		global $user;
		return isset($user['email']) && 
				$user['email']== $pass;
	}
 ?>