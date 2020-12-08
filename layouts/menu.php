<?php
$sql = [
    ['regiao', 'Região'],
    ['transportadoras', 'Transportadoras'],
    ['categorias', 'Categorias']
];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="text-light navbar-brand" href="index.php">Trabalho Final</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php
        foreach ($sql as $linha){
            echo '<li class="nav-item">
                    <a class="text-light nav-link"  href="index.php?page='.$linha[0].'">'.$linha[1].'</a>
                </li>';
        }

        ?>
        </ul>
    </div>
</nav>