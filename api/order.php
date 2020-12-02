<?php
ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
session_start();
include 'broodjesprovider.php';
$filename = "db.csv";
try {
    if(!file_exists($filename)) {fclose(fopen($filename, "w"));
}
$db = fopen($filename, 'a');
fwrite($db, $_SESSION["name"].",");
fwrite($db, getBroodjes()[$_GET['id']]->csv);
fwrite($db, "\n");
fclose($db);
    echo "Bestelling doorgevoerd!";
} catch (\Throwable $th) {
    echo "Bestelling mislukt!";
}
?>