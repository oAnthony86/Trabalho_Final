<?php
$sql = [
    ['regiao', 'Região'],
    ['transportadoras', 'Transportadoras'],
    ['categorias', 'Categorias']
];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="text-light navbar-brand" href="#">Trabalho Final</a>
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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>