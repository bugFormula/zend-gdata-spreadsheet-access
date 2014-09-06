<?php 
/**
* User Class defines user credentials.
*/
class User
{
	private $username;
	private $password;
	function __construct($pUsername, $pPassword)
	{
		$this->username = $pUsername;
		$this->password = $pPassword;
	}
	function getUsername()
	{
		return $this->username;
	}
	function getPassword()
	{
		return $this->password;
	}
}
?>