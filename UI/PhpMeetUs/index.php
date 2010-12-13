<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
        <?php
        

            require './facebook/src/facebook.php';

            $facebook = new Facebook(array(
            'appId'  => '102810506459481',
            'secret' => '8fa1aca969079a5a848de895d7cb5ee3',
            'cookie' => true
            ));

            try {
            $session = $facebook->getSession();

            if (!$session) {
                $url=$facebook->getLoginUrl(array('canvas' => 1,'fbconnect' => 0));
                echo ('<script type="text/javascript">top.location.href=\''.$url.'\';</script>');
            }
            else {

                $me = $facebook->api('/me');
            }
            } catch (FacebookApiException $e) {
                print 'error: ' . $e;
                error_log($e);
            }
            $pagename = "welcome.php";
            require_once("./template/template.php");
        ?>


</html>
