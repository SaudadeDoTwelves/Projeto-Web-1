<?php   
   function imagem($arq) {
        $root = "imagens/$arq";

        if (is_null($arq) || !file_exists($root)) {
            return "imagens/naodisponivel.png";
        }
        else {
            return $root;
        }
    }

    function ferramentasEditor() {
        return "<a href='/'><span class='material-icons md-light md-inactive md-36'>edit_note</span></a>";
    }

    function FerramentasAdmin() {
        return ["<a href='/'><span class='material-symbols-outlined'>delete</span></a>", "<a href='/'><span class='material-icons md-light md-inactive md-36'>edit_note</span></a>"];

    }

    function editar($id){
        require "banco.php";
     
        $q = "UPDATE filmes SET diretor = 'PIRAMIDE' WHERE codf=$id";

        $banco->query($q);
    } 
    
    function deletar($id){
        require_once "banco.php";
     
        $q = "DELETE FROM filmes WHERE codf=$id";

        $banco->query($q);
    } 

    function sair() {
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['cargo']);
    }

    