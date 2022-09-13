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
    <title></title>
</head>
<body>
    <main>
        <?php 
        
        sair();

        header("location:../index.php");
        ?>
    </main>
</body>
</html>