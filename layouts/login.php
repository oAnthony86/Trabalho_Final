<?php
            
            if(isset($_POST['logar'])) {
                $stmt = $conexao->prepare('SELECT login FROM USUARIO WHERE login = :login AND senha = md5(:senha)');
                $stmt->bindParam(':login', $_POST['login']);
                $stmt->bindParam(':senha', $_POST['senha']);
                $stmt->execute();
                $result = $stmt->fetchAll();

                if($_POST['login'] == $result[0]['login']) {
                    $_SESSION['usuariologado'] = true;
                    header('Location: ./index.php');
                } else {
                    $_SESSION['errologin'] = true;
                }
            }

            if(isset($_POST['errologin']) && $_SESSION['errologin']){
                $_SESSION['errologin'] = false;
                echo "<b> Usuário ou Senha inválido! </b>";
            }

        ?>


        <div class="container">
            <div class="col-md">
                <div class="row">
                    <div class="col-6">
                        <h2>Login:</h2>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-info float-right" href="?action=cadastrarse">Cadastrar-se</a>
                    </div>
                </div>
                <hr />
                <form method="POST">
                    <div class="form-group">
                        <label for="login">Login:</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login" />
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" />
                    </div>
                    <input class="btn btn-success" type="submit" name="logar" value="Logar"/>
                </form>
                
            </div>
        </div>