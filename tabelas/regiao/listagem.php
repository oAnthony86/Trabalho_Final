<?php
    function listar($conexao){
        try{
            $sql = 'SELECT IDRegiao, DescricaoRegiao 
                      FROM regiao';
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_NUM);          
                       
        }catch(PDOException $erro){
            $erro->getMessage(); 
        }
    }

    /*function Cab_tabela(){
        echo '<div class="container">
                <div class="row">
                    <div class="col-6">
                        <h2>Região</h2>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-success float-right" href="?page=regiao&action=cadastrar">Cadastrar Nova Região</a>
                    </div>
                </div>
            </div>';
    }*/

    function tabela($registro){
        echo '<table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>';
            if (count($registro)){
                foreach($registro as $linha){
                    echo '<tr>';
                            foreach($linha as $coluna){
                                echo '<td>'.$coluna.'</td>';
                            }
                    echo '<td><a href="index.php?page=regiao&alterar='.$linha[0].'">Alterar</a>';
                    echo ' | ';
                    echo '<a href="index.php?page=regiao&deletar='.$linha[0].'">Deletar</a></td>';
                    echo '</tr>';
                }
            }
                    
        echo   '</tbody>
            </table>';
    }
