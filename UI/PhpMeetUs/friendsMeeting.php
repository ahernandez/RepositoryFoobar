<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
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

    	include_once "fbmain.php";
    	$config['baseurl']  =   "http://apps.facebook/easytomeetus/RepositoryFoobar/UI/PhpMeetUs/";
 
    	//if user is logged in and session is valid.
    	if ($fbme){
    	
    		$friends = $facebook->api("me/friends");
  			$friends_list = $friends['data'];
    	 
    }
?>
<!-- <body> -->
    <div id="fb-root"></div>
        <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({appId: '<?=$fbconfig['appid' ]?>', status: true, cookie: true, xfbml: true});
 
                /* All the events registered */
                FB.Event.subscribe('auth.login', function(response) {
                    // do something with response
                    login();
                });
                
                FB.Event.subscribe('auth.logout', function(response) {
                    // do something with response
                    logout();
                });
            };
            (function() {
                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.src = document.location.protocol +
                    '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());
 
            function login(){
                document.location.href = "<?=$config['baseurl']?>";
            }
            function logout(){
                document.location.href = "<?=$config['baseurl']?>";
            }
</script>
<style type="text/css">
    .box{
        margin: 5px;
        border: 1px solid #60729b;
        padding: 5px;
        width: 400px;
        height: 200px;
        overflow:auto;
        background-color: #e6ebf8;
    }
</style>
 
    <!-- <h3>>Friend Selector for the event | MeetUst</h3> -->
    <?php if (!$fbme) { ?>
        You've to login using FB Login Button to invite friends.
    <?php } ?>
    <p>
        <fb:login-button autologoutlink="true" perms="email,status_update,publish_stream"></fb:login-button>
    </p>
 
    <!-- all time check if user session is valid or not -->
    <?php if ($fbme){ ?>
    <table border="0" cellspacing="3" cellpadding="3">
        <tr>
            <td>
                <!-- Data retrived from user profile are shown here -->
                <b>Select friends</b>
                <form action="friendsMeeting.php">
                <div class="box"> 
  					<input type="hidden" name="envoi" value="yes"> 
  					<?php
  					foreach ($friends_list as $friend) { 
  						?>
  						<input type="checkbox" name="friends_chosen[]" value=<?php echo '"'. $friend['id'] .'"'; ?> >&nbsp; <?php echo $friend['name']; ?><br>
  	
  						<?php
  						} 

					?>
					</div>
					<br>
					<input type="submit" value="Send invitation to friends">
					</form>
            </td>
            
        </tr>
    
    <?php    
    $envoi = $_GET['envoi'];
	$friends_chosen = $_GET['friends_chosen'];
	
	if ($envoi == 'yes') {
		
		$token = $session['access_token'];
		
		//$options_text = implode(', ',$friends_chosen);    
        ?>
        <tr>
            <td>
                <div class="box">
                    <b>Friends chosen</b>
                    <?php   
                    
        for ($i=0; $i <count($friends_chosen); $i++)
		{
		
  		$uid = $friends_chosen[$i];
  		
  		//$uid = 'me';
  
  		$attachment = array(
 			'access_token' => $token,
 			'message' => 'I invite you to an event. Please give me your disponibility!', // $message
 			'name' => 'MeetUs', // Do we need to put the app's name, link, description, and picture here manually?
 			'link' => 'http://apps.facebook.com/easytomeetus/',
 			'description' => 'The simplest way to organize event with all your friends!',
 			'picture'=> 'http://economy.ocregister.com/files/2009/02/calendar-300x224.jpg',
		);
		$fb_feed_publish = $facebook->api("/$uid/feed", 'POST', $attachment); //$uid
			echo '<p> Invitation sent to uid = '.$uid.'</p>';
		}
	
	?>
                </div>
            </td>
        </tr>
    <?php } ?>    
    </table>
        <?php } ?>
 
  <!--  </body> -->
</html>
