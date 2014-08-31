<?php 
/**
* User Class defines user credentials.
*/
class User
{
	private $username;
	private $password;
	
	function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}
}

?>