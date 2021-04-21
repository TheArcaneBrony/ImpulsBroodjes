<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once 'broodjesprovider.php';
$type = $_GET["type"];
if(!typeExists($type)){
    echo "Invalid type!";
    exit();
}
$types = getTypes();
$items = getItems($type);
$id = $_GET['id'];
$url = sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
);
$baseurl = str_split($url, strpos($url, '?'))[0];
//check if id is negative
if($id<0) {
    header('Location: '.$baseurl.'?id='.count(getAllItems())+$id.'&type='.$type);
    exit();
}
//id doesn't exist in this item type, loop back under next type
if(!array_key_exists($id, $items)){
    header('Location: '.$baseurl.'?id='.($id-count($items)).'&type='.$types[(array_search($type, $types)+1)%count($types)]);
    exit();
}
?>
<style>
        body{color: white;}
        #preview {
            height: 128px;
            width: 128px;
            border-radius: 64px;
            vertical-align: middle;
            object-fit: cover;
        }
        body {
            background-color: #242424;
            color: #ffffff;
            font-family: 'Segoe UI';
            
            overflow: hidden;
        }
        broodje {
            vertical-align: middle;
            /* top: 50%; */
            padding-top: 20%;
            display: block;
        }
        .col {
            float: left;
            width: 50%;
          }
          .columnLayout:after {
            display: table;
            clear: both;
          }
    </style>
    <script>
    function order(){
        $('#ctx').load('order.php?id=<?php echo $id; ?>&type=<?php echo $type; ?>&count='+$("#count")[0].value);
    }
    </script>
    <center>
        <?php
    $broodje = $items[$id];
    echo "<h1>".$broodje->name."</h1>
    <div id='columnLayout'>
        <div class='col'>
            <img id='preview' loading='lazy' async='' accesskey='0' src='".$broodje->thumb128."'>
        </div>
        <div class='col'>
        <a>".$broodje->ingredientListHtml."</a>
        </div>
    </div><br>
    <price>Prijs: € ".$broodje->price."</price><br><br>";
    if(!(isset($_SESSION["user_firstname"]))) {
        echo "<b>Gelieve in te loggen!</b>"; 
    }
    else { 
        echo "<div id=ctx>
        <input id=count type=number value=1 min=1 max=5></input> 
        <input type=submit value='Bestellen' onclick='order()'></input>
        </div>"; 
    }
?>
    </center>