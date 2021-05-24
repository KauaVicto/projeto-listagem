<?php
    include "funcoes.php";

    $indice = filter_input(INPUT_GET, 'indice');
    $page = filter_input(INPUT_GET, 'page');
    $page = ($page == NULL) ? 0 : $page;
    $dados = buscarDados();
    
    // Verifico qual a página e o filme inicial e final que deve mostrar
    $ini = $page * 4;
    $fin = ($page * 4) + 4;

    if($indice != NULL){
        $dados = excluir($indice, $dados);
    }

    $filmes = separarDados($dados);

    $npages = pages($filmes);
    

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>😌Meus Filmes e Séries</title>
</head>
<body>
    
    <?php include "header.php" ?>

    <main class="lista">

        <h1>Meus Filmes e Séries</h1>

        <ul>

            <?php if(count($filmes) == 0) { ?> 
                <h3>Nenhum filme ou série cadastrado</h3>
            <?php } ?>

            <?php for($j = $ini;$j < $fin;$j++){ ?>
            <?php if($j < count($filmes)){ ?>
            <li>
                <h2><?= $filmes[$j][0] ?><a href="index.php?indice=<?=$j?>&page=<?= $page ?>" title="Excluir">❌</a></h2>
                <span><?= $filmes[$j][1] ?> - <i><?= $filmes[$j][2] ?></i> </span>
                <div class="info">

                    <div class="assistiu">Já Assisti: 
                        <?php // Esse bloco php verifica se eu já assisti o filme, caso sim coloca o ✔ e a minha nota, caso não coloca o ✖ e não coloca a nota.
                            if(trim($filmes[$j][4]) == "true"){
                                echo "✔"; 
                        ?>
                    </div>

                    <div class="nota">
                        <?php 
                            for($i = 0; $i < $filmes[$j][3]; $i++){
                                echo "🌟";
                            } 
                        ?>
                    </div>

                    <?php 
                        }else{
                            echo "✖";
                        }
                    ?>

                </div>
            </li>
            <?php } ?>
            <?php } ?>

        </ul>

        <div class="pagina">
            <?php for($i = 0; $i < $npages; $i++){ ?>

                <a href="index.php?page=<?= $i ?>">Página <?= $i+1 ?></a><br>
                
            <?php } ?>
        </div>

    </main>
    
    <?php include 'footer.php' ?>
</body>
</html>