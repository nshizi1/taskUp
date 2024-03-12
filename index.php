<?php

    include("conn.php");
    session_start();
    if($_SESSION["userName"]){
        echo "Session is set";
    }else{
        echo "Session is not set";
        header("location:logIn.php");
    }