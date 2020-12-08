<?php

    if(isset($_POST['alterar'])) {
        try{
            $stmt = $conexao->prepare("UPDATE CATEGORIAS SET   NomeCategoria = :NomeCategoria, Descricao = :Descricao where IDCategoria = :IDCategoria;");
            $stmt->bindParam(':IDRegiao', $_GET['alterar']);
            $stmt->bindParam(':NomeCategoria', $_POST['NomeCategoria']);
            $stmt->execute();
            header('Location: index.php?page=categorias');
        } catch (PDOException $e) {
            echo "Erro: {$e->getMessage()}";
        }
    }

    if(isset($_GET['alterar'])) {
        $stmt = $conexao->prepare("SELECT * FROM CATEGORIAS WHERE IDCategoria = :id;");
        $stmt->bindParam(':id', $_GET['alterar']);
        $stmt->execute();

        $result = $stmt->fetchAll();
    } else {
        echo "Necessário informar o ID para alterar um registro!";
    }
?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Alterar Categoria:</h2>
            </div>
            <div class="col-6">
                <a class="btn btn-success float-right" href="index.php?page=categorias">Listagem de Categorias</a>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=categorias&alterar=<?= $_GET['alterar'] ?>">
            <div class="form-group">
                <label for="desc">Nome da Categoria:</label>
                <input type="text" class="form-control" name="NomeCategoria" id="NomeCategoria" placeholder="Nome da Categoria" value="<?=$result[0]['NomeCategoria']?>"/>
            </div>
            <div class="form-group">
                <label for="desc">Descrição da Categoria:</label>
                <input type="text" class="form-control" name="Descricao" id="Descricao" placeholder="Descrição da Categoria" value="<?=$result[0]['Descricao']?>"/>
            </div>
            <input class="btn btn-success" type="submit" name="alterar" value="Alterar"/>
        </form>
        
    </div>
</div>