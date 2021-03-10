<?php
    
    ini_set('error_reporting', 'on');
    ini_set('display_errors', 'on');
    error_reporting(E_ALL);
include_once "../config.php";
include_once "../api/broodjesprovider.php";
$mysqli = new mysqli(DOMAIN, USERNAME, PASSWORD, SCHEMA);
$stmt = mysqli_prepare($mysqli, "select * from impulsbroodjes.broodjes;");
$i=0;
    while(!mysqli_stmt_execute($stmt) && $i++<25){
        echo "Error:<br>" . $mysqli->error;
    }
    $result = mysqli_stmt_get_result($stmt);
    $rows = $result->num_rows;
    $items = array();
    for ($i=0; $i < $rows; $i++) { 
        $item = mysqli_fetch_assoc($result);
        $image;
        if(str_ends_with(explode("?", $item["broodje_image"])[0], ".jpg")) $image = imagecreatefromjpeg($item["broodje_image"]);
        else $image = imagecreatefrompng($item["broodje_image"]);
        
        $size = min(imagesx($image), imagesy($image));
        $im2 = imagecrop($image, ['x' => (imagesx($image)-$size)/2, 'y' => (imagesy($image)-$size)/2, 'width' => $size, 'height' => $size]);
        if ($im2 !== FALSE) {
            imagepng(imagescale($im2, 150), $i.".png", 0);
        }
        echo "<img style='border-radius:64px; height: 128px; width: 128px;' src='".$i.".png'></img>";
        $items[$i] = Broodje::new($item["broodje_name"], explode(", ", $item["broodje_ingredients"]), $item["broodje_price"], $item["broodje_image"]);
    }
?>