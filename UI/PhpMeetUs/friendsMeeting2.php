<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

    <?php
        $pagename = "friendsMeeting2.php";
        require_once("./template/template2.php");
//        if(isset($_SESSION['location'])) {
//            $_SESSION['location']= $_POST["latlong"];
//            }
    ?>


<?php
    require './facebook/src/facebook.php';
//
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


  $name = $me['name'];

  $friends = $facebook->api("me/friends");

  $friends_list = $friends['data'];
  $list_UIDs="";
  foreach($friends_list as $key => $value){

      $list_UIDs = $list_UIDs.$value['id'].",";
  }
  //echo $list_UIDs;


  ?>

<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '102810506459481',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true  // parse XFBML
  });
</script>
<h4 class="title">Select the friends you want to invite to your Meeting (up to 40)</h4>
<h4 class="explainFriends">Type the name in the box to add friends</h4><br>
<fb:serverFbml>
<script type="text/fbml">
<fb:fbml>
        <fb:request-form type="MeetUs" 
                         content="A friend has invited you to Meeting!! Check it out!"
                         invite="true"
                         action="http://apps.facebook.com/easytomeetus/endpage.php"
                         target="_top">          
        <fb:multi-friend-input width="470px" max="40" border_color="#8496ba"/>
        <br>
        <br>
        <fb:request-form-submit import_external_friends="true"/>
        </fb:request-form>
</fb:fbml>
</script>
</fb:serverFbml>

