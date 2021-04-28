<?php
//importeer broodjes-lijst om naam en prijs op te vragen
include_once 'broodjesprovider.php';
//check login
if (!isset($_SESSION["user_id"])) echo "Gelieve in te loggen!";
//voeg in in database
if ($_SESSION["user_email"] != "demo") {
    $stmt = $mysqli->prepare("insert into impulsbroodjes.orders (user_id, broodje_id, aantal) values (?,?,?)");
    $stmt->bind_param('iii', $_SESSION["user_id"], getItems($_GET['type'])[$_GET['id']]->id, $_GET["count"]);
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error:<br>" . $mysqli->error;
    }
}
echo "Bestelling doorgevoerd!<br>Gelieve aan het onthaal €" . (getItems($_GET['type'])[$_GET['id']]->price * $_GET["count"]) . " te betalen om je bestelling te voltooien!<br>Als dit niet voor 10u gebeurt, wordt je bestelling geannuleerd!";
exit();
