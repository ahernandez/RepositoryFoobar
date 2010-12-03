<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
        $pagename = "datesMeeting.html";
        setcookie("name", $_POST["fname"], time()+3600,"/","");
        setcookie("desc", $_POST["fdesc"], time()+3600,"/","");
        require_once("./template/template.php");
    ?>
    

</html>
