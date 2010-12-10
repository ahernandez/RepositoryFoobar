<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "friendsMeeting.php";
        require_once("./template/template.php");
        if(isset($_SESSION['location'])) {
            $_SESSION['location']= $_POST["latlong"];
            }
        echo $_SESSION['name'];
        echo $_SESSION['desc'];
        echo $_SESSION['dates'];
        echo $_SESSION['location'];
        
       
    ?>
    
<!--
<div id="leftcontent">
<body>-->
<?php
require './facebook/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '102810506459481',
  'secret' => '8fa1aca969079a5a848de895d7cb5ee3',
  'cookie' => false
));

try {
  $session = $facebook->getSession();
  
  if (!$session) {
    $url=$facebook->getLoginUrl(array('canvas' => 1,'fbconnect' => 0));
    echo ('<script type="text/javascript">top.location.href=\''.$url.'\';</script>');
} 
else {
  
  $me = $facebook->api('/me');  
   
  //print_r($me);
  
  echo '<p> Hi '. $me['name'] .', Select your friends : </p><br><br>';
  
 
  $friends = $facebook->api("me/friends");
  
  $friends_list = $friends['data'];
  
  ?>

  <form action="friendsMeeting.php">
  <div style="width:300px;height:300px;overflow:auto;"> 
  <input type="hidden" name="envoi" value="yes"> 
  <?php
  foreach ($friends_list as $friend) { 
  	?>
  	<input type="checkbox" name="friends_chosen[]" value=<?php echo '"'. $friend['id'] .'"'; ?> >&nbsp; <?php echo $friend['name']; ?><br>
  	
  	<?php
  	} 

?>
</div>
<br><br>
<input type="submit" value="Send invitation to friends">
</form>
<?php   
	$envoi = $_GET['envoi'];
	$friends_chosen = $_GET['friends_chosen'];
	
	if ($envoi == 'yes') {
		$options_text = implode(', ',$friends_chosen);
	
     	echo '<p>friends chosen:<br><br>'.$options_text.'</p>';
	}

}
 
  
} catch (FacebookApiException $e) {
  print 'error: ' . $e;
  error_log($e);
}
?>
<!--
</body>
</div>-->
</html>
