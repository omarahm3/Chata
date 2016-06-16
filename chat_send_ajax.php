<?php

     require_once('dbconnect.php');

     db_connect();

     $msg = $_GET["msg"];
     $dt = date("Y-m-d H:i:s");
     $user = $_GET["name"];

     $link = mysqli_connect("localhost", "root", "")
            or die('Could not connect: ' . mysqli_error());
     mysqli_select_db($link, "chat") or die('Could not select database');

     $sql= "INSERT INTO chat(USERNAME,CHATDATE,MSG) " .
          "values(" . quote($user) . "," . quote($dt) . "," . quote($msg) . ");";

          echo $sql;

     $result = mysqli_query($link, $sql);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysqli_error());
        exit();
     }

?>





