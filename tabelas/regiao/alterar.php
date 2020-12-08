<?php

    if(isset($_POST['alterar'])) {
        try{
            $stmt = $conexao->prepare("UPDATE REGIAO SET   DescricaoRegiao = :DescricaoRegiao where IDRegiao = :IDRegiao;");
            $stmt->bindParam(':IDRegiao', $_GET['alterar']);
            $stmt->bindParam(':DescricaoRegiao', $_POST['DescricaoRegiao']);
            $stmt->execute();
            header('Location: index.php?page=regiao');
        } catch (PDOException $e) {
            echo "Erro: {$e->getMessage()}";
        }
    }

    if(isset($_GET['alterar'])) {
        $stmt = $conexao->prepare("SELECT * FROM REGIAO WHERE IDRegiao = :id;");
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
                <h2>Alterar Regiao:</h2>
            </div>
            <div class="col-6">
                <a class="btn btn-success float-right" href="index.php?page=regiao">Listagem de Regiao</a>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=regiao&alterar=<?= $_GET['alterar'] ?>">
            <div class="form-group">
                <label for="desc">Descrição para a Regiao:</label>
                <input type="text" class="form-control" name="DescricaoRegiao" id="DescricaoRegiao" placeholder="Descrição para a Regiao" value="<?=$result[0]['DescricaoRegiao']?>"/>
            </div>
            <input class="btn btn-success" type="submit" name="alterar" value="Alterar"/>
        </form>
        
    </div>
</div>