<?php
    require_once LAYOUTS."header.php";

    require_once LAYOUTS."menu.php";

    require_once LAYOUTS."footer.php";

    if(isset($_SESSION['usuariologado']) && $_SESSION['usuariologado']){
        if (!isset($_GET['page'])){
            require_once 'home.php';
        }else{
            if ($_GET['page'] == 'logoff' ){
                $_SESSION['usuariologado'] = false;
                header('Location: ./index.php');
            }
            require_once 'tabelas/'.$_GET['page'].'/index.php';
        }
    } else {
        if(isset($_GET['action']) && $_GET['action'] == 'cadastrarse'){
            include 'cadastrarse.php';
        } else {
            include 'login.php';
        }
    }
   