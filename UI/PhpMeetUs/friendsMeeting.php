<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "friendsMeeting.html";
        require_once("./template/template.php");
        $nameMeeting = $_POST["fname"];
        $description = $_POST["desc"];
        echo $nameMeeting;
        echo $description;
    ?>

<?php
echo “<h1>Test</h1>”;

/*
require_once ‘appinclude.php’;
echo “<h1>friends_get</h1>”;
echo “<hr />”;
echo “<pre>”;
echo “<h2>Scenario 1: Getting all friends of current user</h2>”;
echo “<h5>Raw output:</h5>”;
print_r($facebook->api_client->friends_get());
echo “<h5>Applied example:</h5>”;
echo “<p>Friends of <fb:name uid=\”$user\” useyou=\”false\” />:</p>”;
$friends = $facebook->api_client->friends_get();
echo “<ul>”;
foreach ($friends as $friend) {	echo “<li><fb:name uid=\”$friend\” useyou=\”false\” /></li>”;}
echo “</ul>”;
echo “</pre>”;
*/
?>
</html>
