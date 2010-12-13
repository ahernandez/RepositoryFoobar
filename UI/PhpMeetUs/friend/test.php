<link rel="stylesheet" type="text/css" href="style.css" />

<?php
require '../src/facebook.php';

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

  <form action="checkbox.php"> 
  <input type="hidden" name="envoi" value="yes"> 
  <?php
  foreach ($friends_list as $friend) { 
  	?>
  	<input type="checkbox" name="friends[]" value=<?php echo '"'. $friend['id'] .'"'; ?> >&nbsp; <?php echo $friend['name']; ?><br>
  	
  	<?php
  	} 

?>
<input type="submit" value="Send invitation to friends">
</form>
<?php   

}
 
  
} catch (FacebookApiException $e) {
  print 'error: ' . $e;
  error_log($e);
}
?>