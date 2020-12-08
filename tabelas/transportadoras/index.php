<div class="container">
<div class="col-8 justify-content-center offset-2">
<?php
    require_once 'listagem.php';
    if (!($_GET['alterar']) and !($_GET['deletar'])){
        require_once 'cadastrar.php';
    }else if($_GET['alterar']){
        require_once 'alterar.php';
    }else if($_GET['deletar']){
        require_once 'deletar.php';
    }
    tabela(listar($conexao));
?>
</div>
</div>