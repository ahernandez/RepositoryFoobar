<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
        <title>MeetUs</title>
        <link href="./template/main.css" type="text/css" rel="stylesheet"></link>
         <script type="text/javascript" src="./datepicker/js/jquery.js"></script>
        <script type="text/javascript" src="./datepicker/js/datepicker.js"></script>
        <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA6lwyViQekds9mGHjmjo4WBSzpAXcQO8KK8MRp-27yMbl_lyiHBRk5dwpgdbBVP9gXNDRrCiu9kCuiw"
          type="text/javascript"></script>
        <script type="text/javascript" src="./template/main.js"></script>
         

    </head>

    <body>
        <div id="page">
            <img  alt="MeetUs"  src="../images/last_ban.png" />
            <div class="nav-container-outer">
               <img src="./images/nav-bg-l.jpg" alt="" class="float-left" />
               <img src="./images/nav-bg-r.jpg" alt="" class="float-right" />
               <ul id="nav-container" class="nav-container">
                   <li><a class="item-primary" href="index.php">Organize Meeting</a></li>
                   <li><span class="divider divider-vert" ></span></li>
                  <li><div class="item-primary">1.Details</div></li>
                   <li><span class="divider divider-vert" ></span></li>
                  <li><div class="item-primary">2.Dates</div>
                       </li>
                   <li><span class="divider divider-vert" ></span></li>
                  <li><div class="item-primary">3.Location</div>
                       </li>
                   <li><span class="divider divider-vert" ></span></li>
                  <li><div class="item-primary">4.Invite Friends</div>
                       </li>
                   <li><span class="divider divider-vert" ></span></li>
                  <li><div class="item-primary" >5.Finish</div>
                       </li>
<!--                   <li><span class="divider divider-vert" ></span></li>
                  <li><a class="item-primary" href="" target="_self"></a>
                       </li>-->
                   <li><span class="divider divider-vert" ></span></li>
                  <li class="clear"> </li>
               </ul>
            </div>

            <div id="mainframe">
            
                <div id="leftcontent">
                    <?php
                    include($pagename);
                    ?>
                </div>
                <div id="rightcontent">
                    <ul>
                        <h4>Meetings as a guest</h4>
                        <li>
                            <a class="item1" href="" target="_self"></a>
                            <p>Leroy's Birthday Party</p>
                        </li>
                        <li><a class="item2" href="" target="_self"></a>
                            <p>Football Match</p></li>
                        <h4>Meetings as a admin</h4>
                        <li><a class="item3" href="" target="_self"></a>
                            <p>Conference Google</p>
                        </li>
                        <li><a class="item4" href="" target="_self"></a>
                            <p>Business Meeting</p>
                        </li>
                    </ul>
                </div>
         </div>
    </div>
    </body>
    
</html>
