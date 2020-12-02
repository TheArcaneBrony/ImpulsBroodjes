<!doctype html>

<head>
    <meta charset='utf-8'>
    <title>Broodjes Impuls</title>
    <style>
        body {
            background-color: #fcf;
            background-image: url(awoo.gif);
            background-size: 128px 128px;
        }

        #header {
            margin: 0px;
        }   

        /* broodjes lijst */

        body {
            background-color: #242424;
            color: #ffffff;
            font-family: 'Segoe UI';
        }

        @keyframes PaginaLoad {
            from {
                opacity: 0;
                margin-top: 10%;
            }
            to {
                margin-top: 5%;
                opacity: 1;
            }
        }
        #broodjes {
            animation: PaginaLoad 1.5s forwards;
        }
    </style>
    <link rel="icon" type="image/png" href="ci.png">
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div style="text-align: center;">
        <div id="header">
            <h1 style="margin-bottom: 0px;">Impuls broodjes</h1>
            <b>DE Corona-veilige broodjesdienst</b>
        </div>
        <hr>
        <div id="broodjes">
            <img src="ci.png" style="border-radius:50%; width: 128px;"><br>
            <p><h1>Info</h1></p><hr style="width: 256px;">
            <p><h2>Wie zijn wij?</h2></p>
            <p>Wij zijn leerlingen van 6IT (2020-2021)!</p>
            <p><h3>Waarom?</h3></p>
            <p>
                Tijdens ons schooljaar werden wij gekweld door Corona.<br>
                Hierdoor hadden wij het idee om een webshop te maken.<br>
                Dit zal het heel wat gemakkelijker en veilig maken!
            </p>
        </div>
    </div>
</body>