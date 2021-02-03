<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once 'broodjesprovider.php';
$items = null;
if($_GET["type"] == "broodjes") {$items = getBroodjes();}
else if($_GET["type"] == "salades") {$items = getSalades();}
$id = $_GET['id'];
?>
<style>
        body{color: white;}
        #preview {
            height: 128px;
            width: 128px;
            border-radius: 64px;
            vertical-align: middle;
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
        $('#ctx').load('order.php?id="<?php echo $id; ?>."')
    }
    </script>
    <center>
        <?php
    $broodje = $items[$id];
    echo "<h1>".$broodje->name."</h1>
    <div id='columnLayout'>
        <div class='col'>
            <img id='preview' loading='lazy' async='' accesskey='0' src='".$broodje->image."'>
        </div>
        <div class='col'>
        <a>".$broodje->ingredientListHtml."</a>
        </div>
    </div><br>
    <price>Prijs: € ".$broodje->price."</price><br><br>";
    if(!(isset($_SESSION["name"]) && strlen($_SESSION['name']) >= 6)) { 
        echo "<b>Gelieve uw naam in te vullen vanboven rechts in deze pagina.</b>"; 
    }
    else { 
        echo "<div id=ctx><input type=submit value='Bestellen' onclick='order()'></input></div>"; 
    }
?>
    </center>