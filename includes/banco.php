<?php
    $banco = new mysqli("localhost", "root", "", "nostromo");
    
    if ($banco->connect_errno) { 
        echo "<p>Erro de conexão $banco->errno : $banco->connect_error</p>";

        die();
    }
    
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");