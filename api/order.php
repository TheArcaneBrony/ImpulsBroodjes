<?php
//laad "sessie" (opgeslagen gegevens zoals gebruikersnaam)
session_start();
//importeer broodjes-lijst om naam en prijs op te vragen
include 'broodjesprovider.php';
//open CSV-database
$filename = "db.csv";
try {
    if(!file_exists($filename)) {fclose(fopen($filename, "w"));
}
$db = fopen($filename, 'a');
//voer nieuwe gegevens in
fwrite($db, $_SESSION["name"].",");
fwrite($db, getBroodjes()[$_GET['id']]->csv);
fwrite($db, "\n");
//sluit het bestand en antwoord status
fclose($db);
    echo "Bestelling doorgevoerd!";
} catch (\Throwable $th) {
    echo "Bestelling mislukt!";
}
?>