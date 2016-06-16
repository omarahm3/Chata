<?php

     require_once('dbconnect.php');

     db_connect();

    function smiley($msg) { 
        $msg = str_replace(":)","<img src=\"smilyes/angel.png\" alt=\":)\" >", $msg); 
        $msg = str_replace("^_^","<img src=\"smilyes/aww.png\" alt=\"^_^\" >", $msg);
        $msg = str_replace("-_-","<img src=\"smilyes/angry.png\" alt=\"-_-\" >", $msg);
        $msg = str_replace(":3","<img src=\"smilyes/cute.png\" alt=\":3\" >", $msg);
        $msg = str_replace("<3","<img src=\"smilyes/heart.png\" alt=\"<3\" >", $msg);
        $msg = str_replace(":(","<img src=\"smilyes/frowning.png\" alt=\":(\" >", $msg);
        $msg = str_replace(":O","<img src=\"smilyes/gasping.png\" alt=\":O\" >", $msg);
        $msg = str_replace(":*","<img src=\"smilyes/kissing.png\" alt=\":*\" >", $msg);
        $msg = str_replace(":P","<img src=\"smilyes/tongue_out.png\" alt=\":P\" >", $msg);

        return $msg; 
    } 


     $link = mysqli_connect("localhost", "root", "", "chat")
            or die('Could not connect: ' . mysqli_error());
     
     $sql = "SELECT *, date_format(chatdate,'%d-%m-%Y %r') as cdt from chat order by ID desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by ID";


     $result = mysqli_query($link, $sql) or die('Query failed: ' . mysqli_error($link));
     
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: verdana, arial;'>";
     while ($line = mysqli_fetch_array($result, MYSQL_ASSOC))
     {
        $m = smiley($line["MSG"]);
       $msg = $msg . "<tr><td>" . $line["cdt"] . "&nbsp;</td>" .
            "<td>" . $line["USERNAME"] . ":&nbsp;</td>" .
            "<td>" . $m . "</td></tr>";

     }
     $msg= $msg . "</table>";
     
     echo $msg;

?>





