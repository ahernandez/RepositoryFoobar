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

</html>
