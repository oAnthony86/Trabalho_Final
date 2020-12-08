<div class="container">
<div class="col-8 justify-content-center offset-2">
<?php
    require_once 'listagem.php';
    require_once 'cadastrar.php';
    tabela(listar($conexao));
?>
</div>
</div>