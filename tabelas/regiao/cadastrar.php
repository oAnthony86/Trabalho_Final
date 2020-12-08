<?php

    if(isset($_POST['cadastrar'])) {
        try{
            $stmt = $conexao->prepare("INSERT INTO REGIAO (IDRegiao,  DescricaoRegiao) VALUES (:idregiao,  :descricaoregiao);");
            $stmt->bindParam(':idregiao', $_POST['IDRegiao']);
            $stmt->bindParam(':descricaoregiao', $_POST['DescricaoRegiao']);
            $stmt->execute();
            header('Location: index.php?page=regiao');
        } catch (PDOException $e) {
            echo "<h2 class='danger'> Falha ao tentar cadastrar a regiao! Verifique as informações e tente novamente. </h2>";
        }
    }

?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Cadastrar Regiao:</h2>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=regiao">
            <div class="form-group">
                <label for="IDRegiao">ID da Regiao:</label>
                <input type="number" class="form-control" name="IDRegiao" id="IDRegiao" placeholder="ID da Regiao" />
            </div>
            <div class="form-group">
                <label for="desc">Descrição da Regiao:</label>
                <input type="text" class="form-control" name="DescricaoRegiao" id="DescricaoRegiao" placeholder="Descrição para a Regiao" />
            </div>
            <input class="btn btn-success" type="submit" name="cadastrar" value="Cadastrar"/>
        </form>
    </div>
</div>