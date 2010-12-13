<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "locationMeeting.html";
        if(isset($_SESSION['dates'])) {
            $_SESSION['dates']= $_POST["arrayDates"];

            }
//        if(isset($_COOKIE['dates'])){
//            setcookie("dates", $_POST["arrayDates"], time()+3600,"/","");
//        }
//       
//        $array= $_POST["arrayDates"];
//        echo $array;
//        echo $_COOKIE["name"];
        require_once("./template/template2.php");
    ?>
    

</html>
