<?php

    if(isset($_POST['cadastrar'])) {
        try{
            $stmt = $conexao->prepare("INSERT INTO CATEGORIAS (IDCategoria, NomeCategoria, Descricao) VALUES (:idcategoria,  :nomecategoria, :descricao);");
            $stmt->bindParam(':idcategoria', $_POST['IDCategoria']);
            $stmt->bindParam(':nomecategoria', $_POST['NomeCategoria']);
            $stmt->bindParam(':descricao', $_POST['Descricao']);
            $stmt->execute();
            header('Location: index.php?page=categorias');
        } catch (PDOException $e) {
            echo "<h2 class='danger'> Falha ao tentar cadastrar a categoria! Verifique as informações e tente novamente. </h2>";
        }
    }

?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Cadastrar Categoria:</h2>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=categorias">
            <div class="form-group">
                <label for="IDRegiao">ID da Categoria:</label>
                <input type="number" class="form-control" name="IDCategoria" id="IDCategoria" placeholder="ID da Categoria" />
            </div>
            <div class="form-group">
                <label for="desc">Nome da Categoria:</label>
                <input type="text" class="form-control" name="NomeCategoria" id="NomeCategoria" placeholder="Nome da Categoria" />
            </div>
            <div class="form-group">
                <label for="IDRegiao">Descrição da Categoria:</label>
                <input type="text" class="form-control" name="Descricao" id="Descricao" placeholder="Descrição da Categoria" />
            </div>
            <input class="btn btn-success" type="submit" name="cadastrar" value="Cadastrar"/>
        </form>
    </div>
</div>