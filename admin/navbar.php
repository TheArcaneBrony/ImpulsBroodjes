<?php
ini_set('error_reporting', 'on');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once 'config.php';
$i = 0;

function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}
function delay($i)
{
    echo 'animation-delay: ' . ($i++ / 16) . 's;';
    return $i;
}
?>
<style>
    @font-face {
        font-family: 'Geo';
        font-style: normal;
        font-weight: 400;
        src: local('Geo'), local('Geo-Regular'), url(https://fonts.gstatic.com/s/geo/v9/CSRz4zRZluflKHpn.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    body {
        margin: 0px;
    }

    #navbar {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 9999;
    }

    #navbar li {
        float: left;
    }

    #navbar li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-family: 'Geo', sans-serif;
        font-size: 25px;
    }

    #navbar li a:hover,
    #navbar li a:active {
        background-color: #111;
    }

    #navbar li a.active {
        background-color: #242424;
    }

    #navbar li a.active:hover,
    #navbar li a.active:active {
        background-color: #999;
    }

    @keyframes FadeIn {
        0% {
            opacity: 0;
            transform: scale(.1);
        }

        85% {
            opacity: 1;
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    #navbar li {
        animation: FadeIn 0.25s linear;
        animation-fill-mode: both;
    }
</style>
<ul id="navbar">
    <li style="<?php $i = delay($i); ?>"><a href="index.php" style="padding: 6px 8px 0px;"><img src="ci.png" style="max-width: 40px; border-radius: 50%;"></a></li>
    <li style="<?php $i = delay($i); ?>"><a class="<?php active('index.php'); ?>" href="/admin/index.php">Home</a></li>
    <li style="<?php $i = delay($i); ?>"><a class="<?php active('entry.php'); ?>" href="/entry.php">Ingeven</a></li>
    <li style="<?php $i = delay($i); ?>"><a class="<?php active('request.php'); ?>" href="/request.php">Opvragen</a></li>

    <li style="<?php $i = delay($i); ?> float: right; height:55px; display: none;"><a href="https://login.microsoftonline.com/thearcanebrony.onmicrosoft.com/oauth2/v2.0/authorize?client_id=04e5139d-0354-4423-bbec-e9e572286e49&scope=*&response_type=SessionToken" style="padding: 0px;"><img src="Login.png" style="max-height: 50px;"></a></li>
    <li style="<?php $i = delay($i); ?> float: right; height:55px;">
        <p>Naam: <input type=text id="nameBox"<?php if(isset($_SESSION["name"])){ echo "value='".$_SESSION['name']."'"; } ?>></p>
    </li>

</ul>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var changeName = function(a) {
        console.log(a.target.value);
        $.get("login.php?n="+a.target.value);
    }
    $(document).ready(function() {
        $("#nameBox").keyup(changeName);
        $("#nameBox").keydown(changeName);
        $("#nameBox").keypress(changeName);
        //$("#a").changed(changeName(a));
        
        $(document).mousemove(function(event) {
            $("#navbar li a").css({
                'text-shadow': `#000 ${event.clientX/window.innerWidth*10}px ${event.clientY/window.innerHeight*5}px ${(event.clientX/window.innerWidth*10 + event.clientY/window.innerHeight*5)/2}px`
            })
        });
    });
</script>
<?php
if (isset($_GET['error'])) {
    foreach ($_GET as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
}
?>