<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php

require './facebook/src/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '102810506459481',
  'secret' => '8fa1aca969079a5a848de895d7cb5ee3',
  'cookie' => true,
));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();

$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

// login or logout url will be needed depending on current user state.

if ($me) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
//$user = $facebook->api('/me');

?>
<html>
    <head>
        <title>Welcome</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        
 
        <h4 class="welcome"> Welcome to MeetUs!!</h4>
        <p>The most simply way to organize a meeting or an event!</p>
        <p>Click the button below to create a new meeting</p>
        <form method="link" action="formphpwebpage.php">
            <input class="organizebutton" align="center" type="submit" value="Organize your Meeting" />
        </form>
        <p>Panel on the right shows you all your Meetings:</p>
        <p>Guest: Give your available dates for the Meetings that you are invited!</p>
        <p>Admin: Check the status of your Meeting!</p>
        <p>
<!--        <img src="https://graph.facebook.com/<?php echo $uid; ?>/picture"><img/>-->
        
        </p>
    </body>
</html>
