<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "friendsMeeting.html";
        require_once("./template/template.php");
        if(isset($_SESSION['location'])) {
            $_SESSION['location']= $_POST["latlong"];
            }
        echo $_SESSION['name'];
        echo $_SESSION['desc'];
        echo $_SESSION['dates'];
        echo $_SESSION['location'];
        
       
    ?>

</html>
