<?php

ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once "config.php";
$mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);

$email = "";
$password = "";
$newpassword = "";
$correctlogin = false;
if(isset($_POST["login"])){
    if($_POST["email"] !== ""){
        $email = $_POST["email"];
    }
    if($_POST["password"] !== ""){
        $password = $_POST["password"];
    }
    if($_POST["newpassword"] !== "" && $_POST["newpassword2"] !== "" && $_POST["newpassword"] == $_POST["newpassword2"]){
        $newpassword = $_POST["newpassword"];
    }
    if($_POST["email"] !== "" && $_POST["password"] !== ""){
        $stmt = $mysqli->prepare("SELECT user_password FROM impulsbroodjes.users WHERE user_email = ?");
        $stmt->bind_param('s', $email);
        if(!mysqli_stmt_execute($stmt)){
            echo "Error:<br>" . $mysqli->error;
        }
        $result = mysqli_stmt_get_result($stmt);
        $hash = mysqli_fetch_row($result);
        if($hash != null && !empty($hash) && password_verify($password, $hash[0])) {
                $correctlogin = true;
        }
        if($correctlogin) {
            if($newpassword != ""){
                $stmt = $mysqli->prepare("UPDATE impulsbroodjes.users SET user_password=? WHERE user_email=?");
                $passhash = password_hash($newpassword, PASSWORD_BCRYPT, ["cost" => 10]);
                $stmt->bind_param('ss', $passhash , $email);
                if(!mysqli_stmt_execute($stmt)){
                    echo "Error:<br>" . $mysqli->error;
                }
            }
        }
    }
}
if(!isset($_POST)) $correctlogin = true;
?>
<!doctype html>

<head>
    <meta charset='utf-8'>
    <title>Broodjes Impuls</title>
    <style>
        body {
            background-color: #242424;
            background-size: 128px 128px;
        }

        #header {
            margin: 0px;
        }   

        /* broodjes lijst */

        body {
            background-color: #242424;
            color: #ffffff;
            font-family: 'Segoe UI';
        }

        @keyframes PaginaLoad {
            from {
                opacity: 0;
                margin-top: 10%;
            }
            to {
                margin-top: 5%;
                opacity: 1;
            }
        }
        #broodjes {
            animation: PaginaLoad 1.5s forwards;
        }
    </style>
    <link rel="icon" type="image/png" href="logo_met_cirkel.png">
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div style="text-align: center;">
        <div id="header">
            <h1 style="margin-bottom: 0px;">IMPULS BROODJES</h1>
            <b>DE Corona-veilige broodjesdienst</b>
        </div>
        <hr>
        <div id="broodjes">
            <img src="bl.png" style="border-radius:50%; width: 128px;"><br>
            <p><h1>Impuls Broodjes</h1></p><hr style="width: 256px;">
            <p><h2>Gebruikerbeheer: <?php echo $_SESSION["user_firstname"].' '.$_SESSION["user_lastname"]; ?></h2></p>
            <form action="user.php" method="post">
            
            <?php if(!$correctlogin) echo "<b style='color: #f00;'>Gelieve uw informatie te controleren!</b><br>"; ?>
                <b>E-mail:</b><br>
                <input name="email" value="<?php echo $_SESSION["user_email"]; ?>"><br>
                <br><b>Wachtwoord</b><br>
                <input name="password" type=password value="<?php echo $password; ?>"><br>
                <br><b>Nieuw wachtwoord</b><br>
                <input name="newpassword" type=password><br>
                <br><b>Nieuw wachtwoord herhalen</b><br>
                <input name="newpassword2" type=password><br><br>
                <button name="login">Informatie bijwerken</button>
            </form>
        </div>
    </div>
</body>