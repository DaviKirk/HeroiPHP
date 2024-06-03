<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php
    $heroi = [
        "marvel" => [
            "homem aranha" => "<img width='300px' src='./imgs/homemAranha.jpg' alt=''>",
            "pantera negra" => "<img width='300px' src='./imgs/panteraNegra.png' alt=''>",
            "homem de ferro" => "<img width='300px' src='./imgs/homemFerro.png' alt=''>", 
            "hulk" => "<img width='300px' src='./imgs/HULK.png' alt=''>",
        ],
        "DC" => [
            "superman" => "<img width='300px' src='./imgs/superman.jpg' alt=''>",
            "batman" => "<img width='300px' src='./imgs/batman.png' alt=''>",
            "flash" => "<img width='300px' src='./imgs/flash.png' alt=''>",
            "asa noturna" => "<img width='300px' src='./imgs/asanoturna.webp' alt=''>",
        ]
    ];

    $error = '';
    $imagem = '';
    $quantHeroi = 0;

    // Verificando se os índices existem no array $_POST
    if (isset($_POST['nomeHeroi']) && isset($_POST['universo']) && isset($_POST['quantHeroi'])) {
        $nomeHeroi = $_POST['nomeHeroi'];
        $universo = $_POST['universo'];
        $quantHeroi = $_POST['quantHeroi'];

        if (!isset($heroi[$universo][$nomeHeroi])) {
            $error = "<h3 class='text-center text-danger'>Herói não encontrado no universo $universo.</h3>";
        } else {
            $imagem = $heroi[$universo][$nomeHeroi];
        }
    }
    ?>
    <div class="mt-5 bg-white p-5 rounded-5 container">
        <form class="needs-validation" method="POST" action="#">

            <label for="universo">Escolha o universo:</label>
            <div class="form-check">
                <div>
                    <input class="form-check-input" type="radio" name="universo" value="DC" required>
                    <label class="form-check-label" for="universo">DC</label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" name="universo" value="marvel" required>
                    <label class="form-check-label" for="universo">Marvel</label>
                </div>
            </div>
            <div form-floating>
                <label class="form-label" for="nomeHeroi">Qual o nome do heroi:</label>
                <input class="form-control" type="text" name="nomeHeroi" id="nomeheroi" required>
            </div>
            <div form-floating>
                <label class="form-label" for="nomeHeroi">Quantas imagens:</label>
                <input class="form-control" type="number" name="quantHeroi" id="Qheroi" required>
            </div>
            <div class="pt-3">
                <input class="btn btn-success" type="submit" value="Gerar Imagens">
                <input class="btn btn-warning" type="reset" value="Reset">
            </div>
        </form>

        <div class="mt-5">
            <?php

            if (!empty($error)) {
                echo ($error);
            } else {
                for ($i = 0; $i < $quantHeroi; $i++) {
                    echo ($imagem);
                }
            }

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>