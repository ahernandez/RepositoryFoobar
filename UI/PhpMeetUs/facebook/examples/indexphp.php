<?php
// Awesome Facebook Application
//
// Name: MeetUs
//

require_once '../src/facebook.php';

// Create our Application instance.
$facebook = new Facebook(array(
  'appId'  => '102810506459481',
  'secret' => '8fa1aca969079a5a848de895d7cb5ee3',
  'cookie' => true,
));