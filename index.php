<!doctype html>

<head>
    <meta charset='utf-8'>
    <title>Broodjes Impuls</title>
    <style>
        body {
            background-color: #242424;
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
    <link rel="icon" type="image/png" href="logo_met_cirkel.png">
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div style="text-align: center;">
        <div id="header">
            <h1 style="margin-bottom: 0px;">IMPULS BROODJES</h1>
            <b>DE Corona-veilige broodjesdienst</b>
        </div>
        <hr>
        <div id="broodjes">
            <img src="bl.png" style="border-radius:50%; width: 128px;"><br>
            <p><h1>Impuls Broodjes</h1></p><hr style="width: 256px;">
            <p><h2>Het GIP-project van 6IT</h2></p>
            <p><h3>Welkom op de broodjes webshop van Campus Impuls.</h3></p>
            <p>De website is bedoelt voor het bestellen van broodjes/salades te vergemakkelijken in tijden van COVID-19.<br></p>
        </div>
    </div>
</body>