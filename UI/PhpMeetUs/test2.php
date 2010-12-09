<?php

define('FACEBOOK_APP_ID', '102810506459481');
define('FACEBOOK_SECRET', '8fa1aca969079a5a848de895d7cb5ee3');

function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
  ksort($args);
  $payload = '';
  foreach ($args as $key => $value) {
    if ($key != 'sig') {
      $payload .= $key . '=' . $value;
    }
  }
  if (md5($payload . $application_secret) != $args['sig']) {
    return null;
  }
  return $args;
}

$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>
    <h4 class="welcome">Welcome to MeetUs!!</h4>
        <p>The most simply way to organize a meeting or an event!</p>
        <p>Click the button below to create a new meeting</p>
        <form method="link" action="formphpwebpage.php">
            <input class="organizebutton" align="center" type="submit" value="Organize your Meeting" />
        </form>
        <p>Panel on the right shows you all your Meetings:</p>
        <p>Guest: Give your available dates for the Meetings that you are invited!</p>
        <p>Admin: Check the status of your Meeting!</p>
    <?php if ($cookie) { ?>
      Your user ID is <?= $cookie['uid'] ?>
    <?php } else { ?>
      <fb:login-button></fb:login-button>
    <?php } ?>

    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script>
      FB.init({appId: '<?= FACEBOOK_APP_ID ?>', status: true,
               cookie: true, xfbml: true});
      FB.Event.subscribe('auth.login', function(response) {
        window.location.reload();
      });
    </script>
  </body>
</html>