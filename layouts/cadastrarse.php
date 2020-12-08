<?php
            
            if(isset($_POST['cadastrar'])) {
                try{
                    $stmt = $conexao->prepare("INSERT INTO USUARIO (login, senha) VALUES (:login, md5(:senha));");
                    $stmt->bindParam(':login', $_POST['login']);
                    $stmt->bindParam(':senha', $_POST['senha']);
                    $stmt->execute();
                    header('Location: ./index.php');
                } catch (PDOException $e) {
                    echo "Erro: {$e->getMessage()}";
                }
            }else{
                echo 'A';
            }

        ?>


        <div class="container">
            <div class="col-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Novo Usuário:</h2>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-info float-right" href="?action=login">Retornar</a>
                    </div>
                </div>
                <hr />
                <form method="POST">
                    <div class="form-group">
                        <label for="login">Nome de Usuário:</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Nome de Usuário" />
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" />
                    </div>
                    <input class="btn btn-success" type="submit" name="cadastrar" value="cadastrar"/>
                </form>
                
            </div>
        </div>