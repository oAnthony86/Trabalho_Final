<?php

    if(isset($_POST['cadastrar'])) {
        try{
            $stmt = $conexao->prepare("INSERT INTO TERRITORIOS (IDTerritorio,  DescricaoTerritorio, IDRegiao) VALUES (:idterritorio,  :descricaoterritorio, :idregiao);");
            $stmt->bindParam(':idterritorio', $_POST['IDTerritorio']);
            $stmt->bindParam(':descricaoregiao', $_POST['DescricaoTerritorio']);
            $stmt->bindParam(':idregiao', $_POST['IDRegiao']);
            $stmt->execute();
            header('Location: index.php?page=territorio');
        } catch (PDOException $e) {
            echo "<h2 class='danger'> Falha ao tentar cadastrar o territorio! Verifique as informações e tente novamente. </h2>";
        }
    }

?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Cadastrar Territorio:</h2>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=territorios">
            <div class="form-group">
                <label for="IDRegiao">ID do Territorio:</label>
                <input type="number" class="form-control" name="IDTerritorio" id="IDTerritorio" placeholder="ID do Territorio" />
            </div>
            <div class="form-group">
                <label for="desc">Descrição do Territorio:</label>
                <input type="text" class="form-control" name="DescricaoTerritorio" id="DescricaoTerritorio" placeholder="Descrição para o Territorio" />
            </div>
            <div class="form-group">
                <label for="IDRegiao">ID da Regiao:</label>
                <input type="number" class="form-control" name="IDRegiao" id="IDRegiao" placeholder="ID da Regiao" />
            </div>
            <input class="btn btn-success" type="submit" name="cadastrar" value="Cadastrar"/>
        </form>
    </div>
</div>