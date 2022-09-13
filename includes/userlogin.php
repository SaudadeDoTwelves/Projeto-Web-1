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
    <title>Entre/Cadastre-se</title>
</head>

<body>
    <main>
        <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;

        if (is_null($u) || is_null($s)) {
            require_once "user-form.php";
        } else {
            $q = "SELECT usuario, nome, senha, cargo FROM usuarios WHERE usuario = '$u'";
            $busca = $banco->query($q);

            if ($busca) {
                $registro = $busca->fetch_object();

                if ($busca->num_rows>0) {
                    
                    if (verificarHash($s, $registro->senha)) {
                        $_SESSION['user'] = $registro->usuario;
                        $_SESSION['nome'] = $registro->nome;
                        $_SESSION['cargo'] = $registro->cargo;
    
                        header("location:../index.php");
                    } else {
                        echo "senha inválida";
                    }
                }
                else {
                    echo "usuário não existe";
                }
            }
        }
        ?>
    </main>
</body>

</html>