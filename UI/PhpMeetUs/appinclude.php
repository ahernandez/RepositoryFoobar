<?php
require_once './facebook/src/facebook.php';
// *** Add your Facebook API Key, Secret Key, and Callback URL here *** 
$appapikey = 'f0b3470dc1e813fc9fb41a88e536cddd';
$appsecret = '8fa1aca969079a5a848de895d7cb5ee3';
$appcallbackurl = 'http://apps.facebook.com/easytomeetus/';
// Connect to Facebook, retrieve user
$facebook = new Facebook($appapikey, $appsecret);
$user = $facebook->require_login();
// Exception handler for invalid session_keys
try {	// If app is not added, then attempt to add
	if (!$facebook->api_client->users_isAppAdded()) {		$facebook->redirect($facebook->get_add_url());	} 
} catch (Exception $ex) {
	// Clear out cookies for app and redirect user to a login prompt 
	$facebook->set_user(null, null);	$facebook->redirect($appcallbackurl);
}?>