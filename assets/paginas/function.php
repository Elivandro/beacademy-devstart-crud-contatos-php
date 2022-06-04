<?php
    declare(strict_types = 1);

    function home(){
        include "./assets/paginas/home.php";
    }

    function login(){

        $login = file("./assets/dados/usuario.csv");
        include "./assets/paginas/login.php";

    }

    function cadastro(){

        $titulo = "Cadastrar contato";
        $btnReg = "Cadastrar";


        if($_POST){


            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];

            $arquivo = fopen("./assets/dados/contatos.csv", "a+");
                fwrite($arquivo, "{$nome};{$email};{$telefone}".PHP_EOL);
                fclose($arquivo);

            $class ="alert alert-success";
            $notify = "Contato cadastrado com sucesso.";

        }else{

            $nome = "";
            $email = "";
            $telefone = "";

            $class = "alert alert-info";
            $notify = "Cadastre seu contato";

        }

        include "./assets/paginas/cadastro.php";
    }

    function listar(){

        $contatos = file("./assets/dados/contatos.csv");

        include "./assets/paginas/listar.php";

    }

    function relatorios(){
        include "./assets/paginas/relatorio.php";
    }

    function editar(){

        $id = $_GET['id'];
        $contatos = file("./assets/dados/contatos.csv");

        $titulo = "Editar contato";
        $btnReg = "Editar";


        if($_POST){

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];

            $contatos[$id] = "{$nome};{$email};{$telefone}".PHP_EOL;

            unlink("./assets/dados/contatos.csv");

            foreach($contatos as $cadaContato){

                $arquivo = fopen("./assets/dados/contatos.csv", "a+");
                fwrite($arquivo, $cadaContato);
                fclose($arquivo);

            }

            $class ="alert alert-success";
            $notify = "Contato editado com sucesso.";

        }else{

            $dados = $contatos[$id];
            $contato = explode(";", $dados);

            $nome = $contato[0];
            $email = $contato[1];
            $telefone = $contato[2];

            $class ="alert alert-warning";
            $notify = "Editar contato.";

        }

        include "./assets/paginas/cadastro.php";

}

    function excluir(){
        $id = $_GET['id'];

        $contatos = file("./assets/dados/contatos.csv");

        unset($contatos[$id]);

        unlink("./assets/dados/contatos.csv");
        $arquivo = fopen("./assets/dados/contatos.csv", "a+");

        foreach($contatos as $cadaContato){
            fwrite($arquivo, $cadaContato);
        }

        $class ="alert alert-warning";
        $notify = "Contato excluido com sucesso.";

        include "./assets/paginas/msg.php"; 
    }

    function error404(){
        include "./assets/paginas/404.php";
    }

?>