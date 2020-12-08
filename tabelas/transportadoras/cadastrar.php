<?php

    if(isset($_POST['cadastrar'])) {
        try{
            $stmt = $conexao->prepare("INSERT INTO TRANSPORTADORAS (IDTransportadora, NomeConpanhia, Telefone) VALUES (:idtransportadora,  :nomeconpanhia, :telefone);");
            $stmt->bindParam(':idtransportadora', $_POST['IDTransportadora']);
            $stmt->bindParam(':nomeconpanhia', $_POST['NomeConpanhia']);
            $stmt->bindParam(':telefone', $_POST['Telefone']);
            $stmt->execute();
            header('Location: index.php?page=transportadoras');
        } catch (PDOException $e) {
            echo "<h2 class='danger'> Falha ao tentar cadastrar a transportadora! Verifique as informações e tente novamente. </h2>";
        }
    }

?>

<div class="container mb-2">
    <div class="col-md">
        <div class="row">
            <div class="col-6">
                <h2>Cadastrar Transportadora:</h2>
            </div>
        </div>
        <hr />
        <form method="POST" action="index.php?page=transportadoras">
            <div class="form-group">
                <label for="IDRegiao">ID da Transportadora:</label>
                <input type="number" class="form-control" name="IDTransportadora" id="IDTransportadora" placeholder="ID da Transportadora" />
            </div>
            <div class="form-group">
                <label for="desc">Nome da Companhia:</label>
                <input type="text" class="form-control" name="NomeConpanhia" id="NomeConpanhia" placeholder="Nome da Companhia" />
            </div>
            <div class="form-group">
                <label for="IDRegiao">Telefone:</label>
                <input type="tel" class="form-control" name="Telefone" id="Telefone" placeholder="Telefone da Transportadora" />
            </div>
            <input class="btn btn-success" type="submit" name="cadastrar" value="Cadastrar"/>
        </form>
    </div>
</div>