<?php

    //servidor, usario, password, DB
    $db = new mysqli('localhost', 'root', '', 'satelite');
    
    //Para que entienda las tildes
    $acentos = $db->query("SET NAMES 'utf8'");
        
    if($db->connect_error > 0)
    {
        die('Imposible establecer conexión [' . $db->connect_error . ']');
        
    }
?>