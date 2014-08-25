<?php
/* Zend Gdata Component Front-Door Test Script
 * to directly access Google spreadsheets.
 * @author Simon Parker 
 */
/* (Google user account Credentials (Definite Salt/Encryption Fork for user input method) */
$inputUsername = 'username';
$inputPassword = 'password';
/* Aquisition of Gdata Components. */
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
/* Initialise specific Zend Gdata services. */
$service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
$client = Zend_Gdata_ClientLogin::getHttpClient($inputUsername, $inputPassword, $service);
$spreadSheetService = new Zend_Gdata_Spreadsheets($client);
$feed = $spreadSheetService->getSpreadsheetFeed();
/* Display all spreadsheet titles and public keys (regardless of sub folders). */
echo "<h1>Google spreadsheets from: $inputUsername:</h1>";
foreach ($feed as $key => $value) {
  echo $value->title.'<br>';
  echo $value->id.'<br>';
}  
?>