<?php


    include "funcoes.php";

    $msg = false;
    $erro = false;

    if($_POST){
        
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $genero = filter_input(INPUT_POST, 'genero');
        $nota = filter_input(INPUT_POST, 'nota');
        $assistiu = filter_input(INPUT_POST, 'assistiu');

        $assistiu = ($assistiu == NULL) ? 'false' : 'true';


        if($titulo != ''){
            
            cadastrar($titulo, $descricao, $genero, $nota, $assistiu);

            $msg = true;
            $erro = false;
        }else{
            $erro = true;
            $msg = false;
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>😌Cadastro Filmes e Séries</title>
</head>
<body>
    
    <?php include "header.php" ?>

    <main class="cadastro">

        <h1>Cadastro de Série e Filmes</h1>

        <form action="cadastro.php" method="post">
            <div class="text">
                <label for="title">Título</label><br>
                <input type="text" name="titulo" id="title">
            </div>

            <div class="text">
                <label for="genero">Gênero</label><br>
                <input type="text" name="genero" id="genero">
            </div>

            <div class="labels">
                <div>
                    <label for="nota">Nota</label><br>
                    <input type="number" name="nota" id="nota" min="0" max="5" value="0">
                </div>

                <div>
                    <label for="assisti">Já Assisti:</label>
                    <input type="checkbox" name="assistiu" id="assisti" value="true">
                </div>
            </div>
            
            <div class="text">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>

            <button>Cadastrar</button>
        </form>

        <?php if($msg){ ?>
            <div class="msg">Cadastra realizado com Sucesso!</div>
        <?php } ?>

        <?php if($erro){ ?>
            <div class="erro">Erro! Você deve inserir o título!</div>
        <?php } ?>

    </main>
    
    <?php include 'footer.php' ?>
</body>
</html>