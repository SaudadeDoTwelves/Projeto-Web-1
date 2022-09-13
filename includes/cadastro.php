<!DOCTYPE html>
<?php
require_once "banco.php";
require_once "login.php";
require_once "funcoes.php";
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="../styles/login.css">
    <title>Entre ou Cadastre-se</title>
</head>

<body>
    <main>
        <?php
            if (!isset($_POST['usuario'])) {
                require "cadastro-form.php";
            }
            else {
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;

                if ($senha1 === $senha2) {
                    
                    if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2)) {
                        echo "preencha todos os dados bro!";
                    }
                    else {
                        $senha = criarHash($senha1);
                        $q = "INSERT INTO usuarios (usuario, nome, senha) VALUES ('$usuario', '$nome', '$senha')";

                        if ($banco->query($q)) {
                            echo "xD cadastrado com sucesso";
                            header("location:userlogin.php");
                        }
                        else {
                            echo "NÃO xD cadastro sem sucesso";
                        }
                    }
                }
                else {
                    echo "NÃO xD";
                }
            }
        ?>
    </main>
</body>

</html>