<?php
    if(isset($_GET["username"]) && isset($_GET["email"]) && isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["password"])){
        $username = $_GET["username"];
        $email = $_GET["email"];
        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];
        $password = $_GET["password"];
    }
    else{
        echo "Missing data!";
    }
?>