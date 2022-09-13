<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] ="";
        $_SESSION['nome'] ="";
        $_SESSION['cargo'] ="";
    }

    function cesar($s) {
        $c='';
        
        for ($i = 0; $i < strlen($s); $i++) {
            $l = ord($s[$i])+1;
            $c.= chr($l);
        }

        return $c;
    } 
   
    function criarHash($s) {
        $pwd=cesar($s);    
        $hash=password_hash($pwd, PASSWORD_DEFAULT);
        
        return $hash;
    }

    function verificarHash($s, $hash) {
        $posi=password_verify(cesar($s), $hash);
        
        return $posi;
    }

    function isLogado() {
        if (empty($_SESSION['user'])) {
            return false;
        }
        else {
            return true;
        }
    }

    function isAdmin() {
        $cargo = $_SESSION['cargo'] ?? null;

        if (is_null($cargo)) {
            return false;
        }
        else if ($cargo == 'admin') {
            return true;
        }
        else {
            return false;
        }
    
    }

    function isModerador() {
        $cargo = $_SESSION['cargo'] ?? null;

        if (is_null($cargo)) {
            return false;
        }
        else if ($cargo == 'editor') {
            return true;
        }
        else {
            return false;
        }
    }

    //Admin - admin - benjo - $2y$10$APDsEaX5pRDkavsINobst.TOKScLRy19goV4yRrym7jqUyZKptclG

    //User123 - Moderador - teste - uftuf - $2y$10$BofZLvGSBOqgiv3i/4NjGuiDayQsm.XkGBfndMZKpqym1Pzom5vPi

    //Feijão - Arroz - 123