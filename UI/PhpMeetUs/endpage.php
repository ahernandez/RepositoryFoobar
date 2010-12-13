<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

    <?php
        echo "hola";
        
        $pagename = "endpage.html";
        
        require_once("./template/template.php");
        foreach ($_REQUEST as $key=>$value ){
            if ($key=="ids"){
                $friends = $value;
                unset($_REQUEST[$key]);
            }
        }

        $friends_list = "";
        foreach ($friends as $key=>$value ){
            $friends_list = $friends_list.$value.",";
        }
        
        $friends_list = substr($friends_list,0,-1);
        echo $friends_list;
//$friends   =   (isset($_REQUEST["ids[]"])   ?   $_REQUEST["ids"] : null);
        //$nonFBfriends = (isset($_REQUEST["email_hashes"]) ? $_REQUEST["email_hashes"] : null);
//        foreach ( $_POST['ids'] as $k=> $c)
//            {
//                $friends = $friends.",".$c;
//            }
//        $friends   =   (isset($_REQUEST["ids"])   ?   $_REQUEST["ids"] : null);
//        $nonFBfriends = (isset($_REQUEST["email_hashes"]) ? $_REQUEST["email_hashes"] : null);
//        $friend1 = $_POST["ids"];
//        $mails = $_POST["email_hashes"];
//
//        echo $friends;
//        echo $nonFBfriends;
//        echo $friends;
//
        //echo $nonFBfriends;
//        $PARAMS = (isset($_POST['ids'])) ? $HTTP_RAW_POST_DATA : $HTTP_GET_VARS;
        //$friends_arr = ["[ids]"];
        
//  if ( gettype( $value ) == "array" ){
//     print "$key == <br>\n";
//     foreach ( $value as $two_dim_value )
//        print "...$two_dim_value<br>";
//  }else {
//     print "$key == $value<br>\n";
//  }
//}
            ?>





