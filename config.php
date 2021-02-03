<?php
    ini_set('error_reporting', 'on');
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
    $debug = false;
    if(isset($_GET['debug'])){
        $debug = true;
    }
    session_start();
    if($debug){
        echo "Started session";
    }
    // hostname, username, password, schema
    define("DOMAIN", "localhost");
    define("USERNAME", "impulsbroodjes");
    define("PASSWORD", "impulsbroodjes");
    define("SCHEMA", "impulsbroodjes");
    $mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);
    if($debug){
        echo "Initialised mysqli";
    }
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>