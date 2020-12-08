<?php
    require_once LAYOUTS."header.php";

    require_once LAYOUTS."menu.php";

    if (!isset($_GET['page'])){
        require_once 'home.php';
    }else{
        require_once 'tabelas/'.$_GET['page'].'/index.php';
    }