<?php
    ini_set('error_reporting', 'on');
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
include_once "../config.php";
$mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);
$t_stmt = mysqli_prepare($mysqli, "select distinct broodje_type from broodjes;");
if(!mysqli_stmt_execute($t_stmt)){
    echo "Error:<br>" . $mysqli->error;
}
$t_result = mysqli_stmt_get_result($t_stmt);
$types = array();

while($row = mysqli_fetch_assoc($t_result)) {
    $types[] = $row["broodje_type"];
}
if(isset($_GET['getTypes'])){
    header('Content-Type: application/json');
    echo json_encode($types, JSON_PRETTY_PRINT);
    exit();
}
function getTypes(){
    global $types; //importeer variabele
    return $types;
}
function typeExists($type){
    global $types; //importeer variabele
    return in_array($type, $types);
}
function getItems($type){
    if(typeExists($type)){
        global $mysqli;
        $stmt = mysqli_prepare($mysqli, "select * from impulsbroodjes.broodjes where broodje_type = '".$type."';");
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
            $items[$i] = Broodje::new($item["broodje_name"], explode(", ", $item["broodje_ingredients"]), $item["broodje_price"], $item["broodje_image_thumbnail_1024"], $item["broodje_image_thumbnail_128"]);
        }
        return $items;
    }
    else {
        echo "Invalid type ".$type."!";
        return array();
    }
}
function getAllItems(){
    $items = array();
    foreach (getTypes() as $key => $value) {
        $items = array_merge($items, getItems($value));
    }
    return $items;
}
function getItemCount($type){
    return count(getItems($type));
}
class Broodje {
    public static function new($name, $ingredients, $price, $image, $thumb128){
        $broodje = new Broodje();
        $broodje->name = $name;
        $broodje->ingredients = $ingredients;
        $broodje->thumb128 = $thumb128;
        if(!empty($price)) {$broodje->price = sprintf("%0.2f", $price);}
        $broodje->image = $image;
        $broodje->ingredientListHtml = "- ".implode("<br>- ", $broodje->ingredients);
        $broodje->csv = $name.",".$price." EUR";
        return $broodje;
    }
    public $id;
    public $name;
    public $ingredients;
    public $image;
    public $thumb128;
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