<div class="container">
<div class="col-8 justify-content-center offset-2">
<?php
    require_once 'listagem.php';
    //Cab_tabela();

    if (!($_GET['alterar'])){
        require_once 'cadastrar.php';
    }else if($_GET['alterar']){
        require_once 'alterar.php';
    }
    tabela(listar($conexao));
?>
</div>
</div>