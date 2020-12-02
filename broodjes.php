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
            background: linear-gradient(180deg, #242424, rgb(64,64,128));
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
            background-color: #a2a2a20f;
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
        }

        #modal {
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
                opacity: 1;
            }
        }

        @keyframes ModalOpen2 {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <link rel="icon" type="image/png" href="ci.png">
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <script>
        function PrepareModal() {
            $('body').append(`<div id='modal-bg'></div>`);
            $('#modal-bg').click(CloseModal);
        }

        function CloseModal() {
            $('.modal').animate({
                opacity: 0,
                width: 0,
                height: 0
            }, 500, function() {
                $('.modal').remove();
            });
            $('#modal-bg').animate({
                opacity: 0
            }, 500, function() {
                $('#modal-bg').remove();
            });
        }

        var loc = window.location.href.replace("broodjes.php","");
        if (!loc.endsWith('/')) loc += '/';

        function OpenModal(id) {
            PrepareModal();
            $('body').append(`<iframe src='${loc+"api/broodje.php?id="+(id-1)}' id='modal' class='modal'></iframe>`);

        }
        $(document).ready(function() {
            $("#broodjes").load("api/getitems.php"); 
            setInterval(() => {
                   
            }, 500);
            
        });
    </script>
    <div style="text-align: center;">
        <div id="header">
            <h1 style="margin-bottom: 0px;">Impuls broodjes</h1>
            <b>DE Corona-veilige broodjesdienst</b>
        </div>
        <hr>
        <div id="broodjes"></div>

        <p></p>
    </div>
</body>