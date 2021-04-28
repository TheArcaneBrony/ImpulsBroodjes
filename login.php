<?php

ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once "config.php";
$mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);

$email = "";
$password = "";
$correctlogin = false;
if(isset($_POST["login"])){
    if($_POST["email"] !== ""){
        $email = $_POST["email"];
    }
    if($_POST["password"] !== ""){
        $password = $_POST["password"];
    }
    if($_POST["email"] !== "" && $_POST["password"] !== ""){
        $stmt = $mysqli->prepare("select user_password from impulsbroodjes.users where user_email = ? and user_enabled = true");
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
            $stmt = $mysqli->prepare("select * from impulsbroodjes.users where user_email = ?");
            $stmt->bind_param('s', $email);
            if(!mysqli_stmt_execute($stmt)){
                echo "Error:<br>" . $mysqli->error;
            }
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $_SESSION = $row;
            header("Location: /");
        }
    }
}
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
            <p><h2>Login</h2></p>
            <form action="login.php" method="post">
                <b>E-mail</b><br>
                <input name="email" value="<?php echo $email; ?>"><br>
                <br>Wachtwoord</b><br>
                <input name="password" value="<?php echo $password; ?>" type="password"><br>
                <?php if(!$correctlogin) echo "<b style='color: #f00;'>Gelieve uw informatie te controleren!</b><br>"; ?>
                <button name="login">Log in</button>
            </form>
        </div>
    </div>
</body>