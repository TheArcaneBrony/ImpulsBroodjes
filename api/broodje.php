<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$id = $_GET['id'];
    echo "<style>
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
    </style>
    <script>
    function order(){
        $('#ctx').load('order.php?id=".$id."')
    }
    </script>
    <center>";
    include 'broodjesprovider.php';
    $broodje = getBroodjes()[$id];
    echo "<broodje>
    <img id='preview' loading='lazy' async='' accesskey='0' src='".$broodje->image."'><br>
    <name>".$broodje->name."</name><br>
    <price>Prijs: € ".$broodje->price."</price><br><br>
    <div id=ctx><input type=submit value='Bestellen' onclick='order()'></input></div>
</broodje>";

    echo "</center>";
?>