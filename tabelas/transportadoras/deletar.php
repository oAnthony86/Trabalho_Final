<?php

    if(isset($_POST['deletar'])) {
        try{
            $stmt = $conexao->prepare("DELETE FROM TRANSPORTADORAS WHERE IDTransportadora = :IDTransportadora;");
            $stmt->bindParam(':IDTransportadora', $_GET['deletar']);
            $stmt->execute();
            header('Location: index.php?page=transportadoras');
        } catch (PDOException $e) {
            echo "Erro: {$e->getMessage()}";
        }
    }

    
?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Deletar Transportadora:</h2>
            </div>
            <div class="col-6">
                <a class="btn btn-success float-right" href="index.php?page=transportadoras">Cancelar</a>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=transportadoras&deletar=<?= $_GET['deletar'] ?>">
            <div class="form-group">
                <label for="desc">Deseja Deletar a Transportadora<?= $_GET['deletar'] ?>?</label>
            </div>
            <input class="btn btn-success" type="submit" name="deletar" value="Deletar"/>
        </form>
        
    </div>
</div>