<?php
/* Zend Gdata Component Front-Door Test Script
 * to directly access Google spreadsheet information.
 * @author Simon Parker 
 */
	/**
	* Autoload Class: naming convention (class.classname.inc) to minimise using repetitive includes.
	* root folder 'classes'.
	*/
	function __autoload($class_name) {
		$file = 'classes/class.' . $class_name .'.inc';
		include $file;
	}
	/**
	* Aquire user input via HTTP POST method.
	*/
	$fUsername = $_POST['username'];
	$fPassword = $_POST['password'];
	/**
	* Pass user input to user object instantiation.
	*/
	$user = new User($fUsername, $fPassword);
	/**
	* Provide Google login details via user Object methods.
	*/
	$inputUsername = $user->getUsername();
	$inputPassword = $user->getPassword();
	/**
	* Aquisition of Gdata Components.
	*/
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata_AuthSub');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
	/** 
	* Initialise specific Zend Gdata services.
	*/
	$service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
	$client = Zend_Gdata_ClientLogin::getHttpClient($inputUsername, $inputPassword, $service);
	$spreadSheetService = new Zend_Gdata_Spreadsheets($client);
	$feed = $spreadSheetService->getSpreadsheetFeed();
	/**
	* Display all spreadsheet titles and public keys (regardless of sub folders).
	*/
	echo "<h1>Google spreadsheets from: $inputUsername:</h1>";
	foreach ($feed as $key => $value) {
		echo $value->title.'<br>';
		echo $value->id.'<br>';
	} 
	?>