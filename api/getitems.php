<?php

ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include 'broodjesprovider.php';
$i = 0;
function delay(&$i){
    return 'animation-delay: '.($i++ / 16).'s';
}
echo "
<style>
@keyframes ItemFadeIn { 
    0% {
      opacity: 0;
    }
    100% {
        
      opacity: 1;
    }
  }
broodje{ 
    animation: ItemFadeIn 0.25s linear;
    animation-fill-mode: both;
}
</style>";
foreach (getBroodjes() as $key => $value) {
    getBroodjeHtml($key, $value);
}
function getBroodjeHtml(&$i, $broodje){
    echo "<broodje style='". delay($i)."' onclick='OpenModal(".$i.")'>
    <img id='preview' loading='lazy' async='' accesskey='0' src='".$broodje->image."'>
    <name>".$broodje->name."</name>
    <price>€ ".$broodje->price."</price><br><br>
</broodje>";
}
