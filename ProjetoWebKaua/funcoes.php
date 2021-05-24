<?php

    define("ARQUIVO", 'docs/dados.txt');

    function buscarDados(){
        $conteudo = file_get_contents(ARQUIVO);
        $dados = explode("\n", $conteudo);

        return $dados;
    }

    function excluir($indice, $dados){
        array_splice($dados,$indice,1);
        $cont = implode("\n",$dados);
        $aberto = fopen(ARQUIVO, "w");
        fwrite($aberto, $cont);
        fclose($aberto);
        return $dados;
    }

    function separarDados($dados){
        $filmes = [];
        foreach($dados as $dado){
            if($dado != ''){
                $filme = explode(";", $dado);
                array_push($filmes, $filme);
            }
        }
        return $filmes;
    }

    function cadastrar($titulo, $descricao, $genero, $nota, $assistiu){
        $nfilme = "$titulo;$descricao;$genero;$nota;$assistiu\n";
            
        $aberto = fopen(ARQUIVO, 'a');
        fwrite($aberto, $nfilme);
        fclose($aberto);
    }

    function pages($filmes){
        //Verifico quantas páginas terá
        if(count($filmes) % 4 != 0){
            $npages = intval(count($filmes)/4)+1;
        }else{
            $npages = intval(count($filmes)/4);
        }
        return $npages;
    }