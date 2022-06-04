<h3 class="mt-5 text-center">Login</h3>
<hr/>
<div class="form1">
    <div class="container-form">
        <p class="alert alert-info">Faça seu login</p>
        <form action="" method="post">
            <input type="text" name="nome" class="form-control mb-3" placeholder="digite seu nome" required/>
            <br/>
            <input type="password" class="form-control mb-3" placeholder="digite sua senha" required/>
            <br/>
            <button type="submit" class="btn btn-primary" value="login">Logar</button>
            <a href="/cadastro" class="btn btn-primary">Cadastro</a>
        </form>
        <p class="alert alert-info mt-3">Dica: 9 digitos.
            <br/>use primeiro nome do desenvolvedor.
            <br/>use nome do programa.
        </p>
    </div>
    <figure>
        <img src="./assets/img/svg/login.svg"/>
    </figure>
</div>
<?php
    if(isset($_POST["login"])){

        foreach($login as $usuario){

            $usuarioInfo = explode(";", $usuario);
            $index = 0;

            $login = $usuarioInfo[0];
            $senha = $usuarioInfo[1];

            echo  $login . " " . $senha;


        }
    }

?>