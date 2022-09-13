<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="styles/style.css">
    <link rel="stylesheet" text="text/css" href="styles/flex.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Os melhores filmes de Ficção Científica de todos os tempos</title>
</head>

<body>
    <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    ?>
    <header>
        <nav> 
            <a class="logo" href="/">NOSTROMOS</a>
            <ul class="nav-list">
                <li><a href="/">Inicio</a></li>
                <li><a href="/">Categorias</a></li>
                <li><a href="/">Sobre</a></li>
                <?php 
                    if (empty($_SESSION['user'])) { 
                        echo "<li><a href='includes/userlogin.php'>Entrar</a></li>"; 
                    } 
                    else {
                        echo "<li><a href='meusdados.php'>" . $_SESSION['nome']; "</a></li>";
                    }
                ?>
                <?php 
                    if (empty($_SESSION['user'])) { 
                        echo "<li><a href='includes/cadastro.php'>Cadastre-se</a></li>"; 
                    } 
                    else {
                        echo "<li><a href='includes/userlogout.php'>Sair</a></li>";
                    }
                ?>
            </ul>
        </nav> 
    </header>
    <main>
        <h1 class="title">FICÇÃO CIENTÍFICA</h1>
        <div class="flexbox-container">
            <?php
            $query = "SELECT f.codf, f.nome, g.genero, f.descricao, f.nota, f.anoprod, f.diretor, f.capa FROM filmes f JOIN generos g ON f.codg=g.codg ORDER BY nome;";

            $busca = $banco->query($query);
            if (!$busca) {
                echo "<p>Erro na busca!</p>";
            } else {
                if ($busca->num_rows == 0) {
                    echo "<p>Nenhum registro encontrado</p>";
                } else {
                    while ($registro = $busca->fetch_object()) {

                        $aux = imagem($registro->capa);

            ?>

                        <div class="flexbox-img">
                            <div class="flexbox-i-img"><?php echo "<img src='$aux' class='img'/>" ?></div>
                        </div>
                        <div class="flexbox-desc">
                            <p class="flexbox-p-nome"><?php echo $registro->nome ?></p>
                            <p class="flexbox-p-anoprod"><?php echo $registro->anoprod ?></p>
                            <p class="flexbox-p-diretor">Diretor: <?php echo $registro->diretor ?></p>
                            <p class="flexbox-p-nota">Nota IMDB: <?php echo $registro->nota ?> |</p>
                            <p class="flexbox-p-genero">Gênero: <?php echo $registro->genero ?></p>
                            <p class="flexbox-p-desc"><?php echo $registro->descricao ?></p>
                        </div>                    
                        <div class="flexbox-admin">
                            <p class="flexbox-p-admin"><?php echo "" ?></p>
                            <?php 
                                if (isAdmin()) {
                                    //Desconstruir array e coletar cada item separadamente  
                                    [$zero, $one] = ferramentasAdmin();
                                    echo $zero;
                                    echo $one;

                                    echo $registro->codf;

                                   // echo "<button onclick='deletar($registro->codf)'> APAGAR </button>";
                                       
                                    //$q = "UPDATE filmes SET diretor = 'PAMONHA' WHERE codf=4";

                                    //$banco->query($q);

                                   // echo "<input type='button' onclick='deletar($registro->codf)'/>";
                                    
                                   // echo deletar($registro->codf);

                                  /*  if(isset($_POST['deletar'])) {
                                        require_once "banco.php";
     
                                        $q = "UPDATE filmes SET diretor = 'PAMONHA' WHERE codf=4";

                                        $banco->query($q);                             
                                        echo "<form method='post'><input type='submit' name='deletar' class='button' value='DELETAR'/></form>";
                                    }

                                    */

                                    if(isset($_POST['editar'])) {
                                        editar($registro->codf);

                                        echo $registro->codf;
                                    }
                                    if(isset($_POST['deletar'])) {
                                        echo "TESTE EDITAR";
                                    }

                                    ?>
                                    <form method="post">
                                    <input type="submit" name="editar"
                                            value="EDITAR"/>
                                      
                                    <input type="submit" name="deletar"
                                            value="DELETAR"/>
                                    </form>
                                    <?php
                                } 

                                else if (isModerador()) {
                                    echo ferramentasEditor();
                                }
                            ?>;
                        </div>

            <?php
                    }
                }
            }
            ?>
        </div>
    </main>
    <?php
    $banco->close();
    ?>
</body>

</html>