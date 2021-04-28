<!doctype html>

<head>
    <meta charset='utf-8'>
    <title>Broodjes Impuls</title>
    <style>
        body {
            background-color: #222;
            background-size: 128px 128px;
        }

        #header {
            margin: 0px;
        }

        input input[type=submit] #header>h1 {
            margin: 0px;
        }


        /* broodjes lijst */

        body {
            background-color: #242424;
            color: #ffffff;
            /* background: linear-gradient(180deg, #242424, rgb(64,64,128)); */
            font-family: 'Segoe UI';
            height:100%;
        }

        name {
            font-size: 20;
            vertical-align: middle;
        }

        price {
            font-size: 20;
            vertical-align: middle;
        }

        broodje {
            width: 500px;
            display: inline-block;
            background-color: #2c2c2c;
            border-image: linear-gradient(0deg, blue,green);
            border-width: 2px;
            border-radius: 25px;
            padding-top: 20px;
            margin: 5px;
        }

        #preview {
            height: 64px;
            width: 64px;
            border-radius: 32px;
            vertical-align: middle;
            object-fit: cover;
        }

        #modal-content {
            width: 640px;
            height: 480px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 25px;
            border: none;
            animation-name: ModalOpen;
            animation-delay: 100ms;
            animation-duration: 500ms;
            background-color: #222;
            z-index: 10001;
        }

        #modal-bg {
            width: 100%;
            height: 100%;
            background-color: #000;
            opacity: 0.75;
            position: fixed;
            top: 0px;
            left: 0px;
            animation-name: ModalOpen2;
            animation-duration: 500ms;
            z-index: 10000;
        }

        @keyframes ModalOpen {
            from {
                width: 0px;
                height: 0px;
                opacity: 0;
            }
            to {
                width: 640px;
                height: 480px;
                opacity: 0.75;
            }
        }

        @keyframes ModalOpen2 {
            from {
                opacity: 0;
            }
            to {
                opacity: 0.75;
            }
        }

        .hover {
            background-color: #666c;
            padding: 15px;
            border-radius: 15px;
            border: 2px solid black;
            z-index: 999900;
        }


        /* modal navigation */
        .modalNav, .modalNav > img {
            max-width: 64px;
            position: fixed;
            top: 45%;
            /* filter: brightness(5); */
            z-index: 100001;
        }
        a#prev {
            left: 1%;
        }
        a#next {
            right: 1%;
        }
    </style>
    <link rel="icon" type="image/png" href="logo_met_cirkel.png">
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <script>
    var currentCategory = "";
    var currentId = "";
function PrepareModal() {
    $('body').append(`<div id='modal'></div>`);
    $('#modal').append(`<div id='modal-bg'></div>`);
    $('#modal-bg').click(CloseModal);
    $("#modal").append(`
    <a class="modalNav" id="prev">
        <img src="res/Back_Arrow.png" onclick="Navigate(false)">
    </a>
    <a class="modalNav" id="next" onclick="Navigate(true)">
        <img src="res/Next_Arrow.png">
    </a>`);
    
    $('a#next').animate({
        right: "15%"
    }, 1000, function() {
    
    });

    $('a#prev').animate({
        left: "10%"
    }, 1000, function() {
       
    });
}
function CloseModal() {
    $('#modal-content').animate({
        opacity: 0,
        width: 0,
        height: 0
    }, 500, function() {
       
    });
    $('#modal-bg').animate({
        opacity: 0
    }, 550, function() {
        $('#modal').remove();
    });
    $('.modalNav').animate({
        opacity: 0
    }, 250, function() {
    });
}
var loc = window.location.href.replace("broodjes.php","");
if (!loc.endsWith('/')) loc += '/';
function OpenModal(id, type) {
    PrepareModal();
    $('#modal').append(`<iframe src='${loc+"api/broodje.php?id="+(id-1)+"&type="+type}' id='modal-content'></iframe>`);
    currentId = id;
}
function Navigate(direction){
    $("#modal-content")[0].src = $("#modal-content")[0].src.replace("id="+currentId, "id=" + (direction ? currentId+1 : currentId-1))
    currentId = Number($("#modal-content")[0].src.split('=')[1].split('&')[0]);
    console.log(currentId);
}
var broodjeTypes;
var currentId;
$(document).ready(function() {
    
    $.getJSON("api/broodjesprovider.php?getTypes", function(result){
        broodjeTypes = result;
	result.forEach((a)=>{
        $("#items").append(`<div id="${a}"></div>`)
        $(`#${a}`).load(`api/getitems.php?type=${a}`);
    });
    })
});
    </script>
    <div id="items" style="text-align: center;">
        <div id="header">
            <h1 style="margin-bottom: 0px;">IMPULS BROODJES</h1>
            <b>DE Corona-veilige broodjesdienst</b>
        </div>
        <hr>
    </div>
</body>