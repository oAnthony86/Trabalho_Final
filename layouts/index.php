<?php
    require_once LAYOUTS."header.php";

    require_once LAYOUTS."menu.php";

    if (!isset($_GET['pagina'])){
        require_once 'home.php';
    }else{
        require_once 'tabelas/'.$_GET['pagina'].'/index.php';
    }