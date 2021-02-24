<?php
    ini_set('error_reporting', 'on');
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
include_once "../config.php";
$mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);
function getBroodjes() {
    // mysqli_query()
    global $mysqli;
    $stmt = mysqli_prepare($mysqli, "select * from impulsbroodjes.broodjes where broodje_type = 'broodje';");
    //$stmt = $mysqli->prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
    //$stmt->bind_param('sssd', $code, $language, $official, $percent);
    if(!mysqli_stmt_execute($stmt)){
        echo "Error:<br>" . $mysqli->error;
    }
    $result = mysqli_stmt_get_result($stmt);
    $rows = $result->num_rows;
    $items = array();
    for ($i=0; $i < $rows; $i++) { 
        $item = mysqli_fetch_assoc($result);
        $items[$i] = Broodje::new($item["broodje_name"], explode(", ", $item["broodje_ingredients"]), $item["broodje_price"], $item["broodje_image"]);
    }
    return $items;
}
function getSalades(){
    global $mysqli;
    $stmt = mysqli_prepare($mysqli, "select * from impulsbroodjes.broodjes where broodje_type = 'salade';");
    //$stmt = $mysqli->prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
    //$stmt->bind_param('sssd', $code, $language, $official, $percent);
    if(!mysqli_stmt_execute($stmt)){
        echo "Error:<br>" . $mysqli->error;
    }
    $result = mysqli_stmt_get_result($stmt);
    $rows = $result->num_rows;
    $items = array();
    for ($i=0; $i < $rows; $i++) { 
        $item = mysqli_fetch_assoc($result);
        $items[$i] = Broodje::new($item["broodje_name"], explode(", ", $item["broodje_ingredients"]), $item["broodje_price"], $item["broodje_image"]);
    }
    return $items;
}
class Broodje {
    public static function new($name, $ingredients, $price, $image){
        $broodje = new Broodje();
        $broodje->name = $name;
        $broodje->ingredients = $ingredients;
        if(!empty($price)) {$broodje->price = $price;}
        $broodje->image = $image;
        $broodje->ingredientListHtml = "- ".implode("<br>- ", $broodje->ingredients);
        $broodje->csv = $name.",".$price." EUR";
        return $broodje;
    }
    public $id;
    public $name;
    public $ingredients;
    public $image;
    public $price="0.00";
    public $ingredientListHtml;
    public $csv;
}

// if(isset($_GET)){
//     echo "Broodjes<br>";
    
//     //getBroodjes();
//     echo str_replace("\n", "<br>", json_encode(getBroodjes(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ));
//     echo "Salades<br>";
//     //var_dump(getSalades());
// }
?>