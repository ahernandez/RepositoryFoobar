<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "datesMeeting.html";

        if(isset($_SESSION['name'])) {
            $_SESSION['name']= $_POST["fname"];
            
            }
        if (isset($_SESSION['desc'])){
            $_SESSION['desc']= $_POST["fdesc"];
        }
        require_once("./template/template.php");
    ?>
    

</html>
