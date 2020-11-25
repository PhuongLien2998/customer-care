<?php
    $conn= mysqli_connect("localhost", "root", "", "chamsockh") or die("can't connect to database");
    if($conn){
        mysqli_set_charset($conn,"utf8");
        //echo "connect success";
    }
    else{
        echo "Failse to connect database";
    }
 ?>



 