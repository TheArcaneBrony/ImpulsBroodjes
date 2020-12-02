<?php
session_start();
if(isset($_GET['n']) && strlen($_GET['n']) <= 16) {
    $_SESSION['name'] = filter_var($_GET['n'], FILTER_SANITIZE_STRING);
    var_dump($_SESSION);
}
else {
    http_response_code(403);
}

?>