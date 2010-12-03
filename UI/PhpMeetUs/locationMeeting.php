<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "locationMeeting.html";
        setcookie("dates", $_POST["arrayDates"], time()+3600,"/","");
//       
//        $array= $_POST["arrayDates"];
//        echo $array;
//        echo $_COOKIE["name"];
        require_once("./template/template.php");
    ?>
    

</html>
