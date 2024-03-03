<?php 
    session_start();
    include './../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript">
        function extrairvalorAposta() {
            var url = window.location.href;
            var match = url.match(/p=(\d+BC)/);
            if (match) {
                var valorAposta = match[1];
                var valorMapeado;
                switch (valorAposta) {
                    case '1BC':
                        valorMapeado = 1;
                        break;
                    case '2BC':
                        valorMapeado = 2;
                        break;
                    case '3BC':
                        valorMapeado = 5;
                        break;
                    default:
                        valorMapeado = 1;
                }
                return valorMapeado;
            }
            return 1;
        }
        var valorAposta = extrairvalorAposta();
        const aposta = extrairvalorAposta();
    </script>
    <title>Jogar 🫰 Subway PIX</title>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/inc/head.php') ?>
    <style>
        body,
        html {
            margin: 0;
            height: 100%;
            background-color: #0b316b;
            overflow: hidden;
            background-image: url('/assets/img/logo/logo.png');
            background-repeat: no-repeat;
            background-size: 40%;
            background-position: center;
        }

        #message {
            text-align: center;
            font-size: 8px;
            z-index: 5;
            font-family: "Verdana", sans-serif;
            color: #fff;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        .dot {
            display: inline;
            margin-left: 0.2em;
            margin-right: 0.2em;
            position: relative;
            top: -1em;
            font-size: 3.5em;
            opacity: 0;
            animation: showHideDot 2.5s ease-in-out infinite;
        }

        .dot.one {
            animation-delay: 0.2s;
        }

        .dot.two {
            animation-delay: 0.4s;
        }

        .dot.three {
            animation-delay: 0.6s;
        }

        @keyframes showHideDot {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            60% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        button#sair {
            position: absolute;
            display: none;
            top: 135px;
            left: calc(50% - 130px);
            padding:.85rem 2.8rem;
            line-height: 32px;
            font-size: 18px;
            text-align: center;
            font-weight:700;
            color: white;
            background-color: #1fbffe;
            box-shadow:-3px 3px 0 0 #1f2024;
            border:4px solid #1f2024;
            border-radius:8px;
            transition:background-color .2s ease,transform .2s ease,box-shadow .2s ease;
            z-index: 100000;
        }
    </style>
</head>
<body>
    <button id="sair">ENCERRAR APOSTA</button>
    <script>
        window.NOSW = true;
        window.GAME_CONFIG = {
            leaderboard: 'mockup',
            bundlesPath: './bundles',
        }
    </script>
    <div id="message">
        <h1>Carregando</h1>
        <h1 class="dot one">.</h1>
        <h1 class="dot two">.</h1>
        <h1 class="dot three">.</h1>
    </div>
    <script src="js/loading.js"></script>
    <script src="js/boot.js?v=<?php echo time(); ?>"></script>
</body>

</html>