<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "friendsMeeting.php";
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
  
  //echo '<p> Hi '.  .', Select your friends : </p><br><br>';
  
  $name = $me['name'];
  
  $friends = $facebook->api("me/friends");
  
  $friends_list = $friends['data'];
  $list_UIDs="";
  foreach($friends_list as $key => $value){
      
      $list_UIDs = $list_UIDs.$value['id'].",";
  }
  //echo $list_UIDs;

  $friendsUIDS ='';
  $array = $_POST['friends_chosen'];
  //print_r($array);
  foreach($array as $key => $value)  {
   $friendsUIDS = $friendsUIDS.$value.",";
   $list_UIDs = str_replace($value.",","",$list_UIDs);
  }
  $list_UIDs = substr($list_UIDs,0,-1);
 // echo chunk_split($list_UIDs, 100, '*<br />');
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

<fb:serverFbml>
<script type="text/fbml">
<fb:fbml>
        <fb:request-form type="MeetUs" content="has invited you to Meeting!! Check it out!"  invite="true"  action="http://apps.facebook.com/easytomeetus/endpage.php">
    <fb:multi-friend-input width="350px" border_color="#8496ba" />
            <fb:request-form-submit/>
    </fb:request-form>
</fb:fbml>
    </script>
</fb:serverFbml>
</html>
