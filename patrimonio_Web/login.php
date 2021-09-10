<?php
    include('config.php');
    if(isset($_POST['acao'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = $pdo->prepare("SELECT * FROM tb_usuarios WHERE usuario = ?");
        $sql->execute([$usuario]);

        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            if(password_verify($senha, $info['senha'])){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $info['id'];
                $_SESSION['usuario'] = $info['usuario'];
                header("Location: main.php");
                die();
            }else{
                //Erro
                echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos!</p></div>';
            }
        }else{
            //Erro
            echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário não encontrado.</p></div>';
        }
    }

	
    include('config.php');
    if($_SESSION['login'] != true){
        header('Location: index.php');
        die();
    }

    echo '<h2>Bom dia '.$_SESSION['usuario'].'.</h2>';   

    if(isset($_GET['sair'])){
        session_destroy();
        header('Location: index.php');
        die();
    }

?>

<form method="post">
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="Entrar" name="acao">
</form>