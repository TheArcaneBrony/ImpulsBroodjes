<?php
//Importeer code om broodjes op te vragen
include 'broodjesprovider.php';
$i = 0;
//Geef een waarde die groter is dan de vorige keer, voor het fade-in-effect
function delay(&$i){
    return 'animation-delay: '.($i++ / 16).'s';
}
//css
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
//genereer HTML voor alle broodjes
if(!isset($_GET["type"])){
  echo "Please enter type!";
  exit();
}
$items = null;
if($_GET["type"] == "broodjes") {$items = getBroodjes(); echo "<h2>Broodjes</h2><hr style='width: 250px;'>";}
else if($_GET["type"] == "salades") {$items = getSalades(); $i += count(getBroodjes()); echo "<h2>Salades</h2><hr style='width: 250px;'>";}
foreach ($items as $key => $value) {
    getBroodjeHtml($i, $value);
}
//antwoord op de web-aanvraag met HTML-code om weer te geven
function getBroodjeHtml(&$i, $broodje){
    echo "<broodje style='". delay($i)."' onclick='OpenModal(".$i.")'>
    <img id='preview' loading='lazy' async accesskey='0' src='".$broodje->image."'>
    <name>".$broodje->name."</name>
    <price>€ ".$broodje->price."</price><br><br>
</broodje>";
}
?>