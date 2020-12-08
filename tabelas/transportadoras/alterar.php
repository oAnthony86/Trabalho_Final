<?php

    if(isset($_POST['alterar'])) {
        try{
            $stmt = $conexao->prepare("UPDATE TRANSPORTADORAS SET   NomeConpanhia = :NomeConpanhia, Telefone = :Telefone where IDTransportadora = :IDTransportadora;");
            $stmt->bindParam(':IDTransportadora', $_GET['alterar']);
            $stmt->bindParam(':NomeConpanhia', $_POST['NomeConpanhia']);
            $stmt->execute();
            header('Location: index.php?page=transportadoras');
        } catch (PDOException $e) {
            echo "Erro: {$e->getMessage()}";
        }
    }

    if(isset($_GET['alterar'])) {
        $stmt = $conexao->prepare("SELECT * FROM TRANSPORTADORAS WHERE IDTransportadora = :id;");
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
                <h2>Alterar Transportadora:</h2>
            </div>
            <div class="col-6">
                <a class="btn btn-success float-right" href="index.php?page=transportadoras">Listagem de Transportadora</a>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=transportadoras&alterar=<?= $_GET['alterar'] ?>">
            <div class="form-group">
                <label for="desc">Nome da Categoria:</label>
                <input type="text" class="form-control" name="NomeConpanhia" id="NomeConpanhia" placeholder="Nome da Companhia" value="<?=$result[0]['NomeConpanhia']?>"/>
            </div>
            <div class="form-group">
                <label for="desc">Telefone da Companhia:</label>
                <input type="text" class="form-control" name="Telefone" id="Telefone" placeholder="Telefone da Companhia" value="<?=$result[0]['Telefone']?>"/>
            </div>
            <input class="btn btn-success" type="submit" name="alterar" value="Alterar"/>
        </form>
        
    </div>
</div>