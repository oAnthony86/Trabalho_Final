<?php
    function listar($conexao){
        try{
            $sql = 'SELECT IDTransportadora, NomeConpanhia, Telefone 
                      FROM transportadoras';
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_NUM);          
                       
        }catch(PDOException $erro){
            $erro->getMessage(); 
        }
    }

    function tabela($registro){
        echo '<table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
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
                    echo '<td><a href="index.php?page=transportadoras&alterar='.$linha[0].'">Alterar</a>';
                    echo ' | ';
                    echo '<a href="index.php?page=transportadoras&deletar='.$linha[0].'">Deletar</a></td>';
                    echo '</tr>';
                }
            }
                    
        echo   '</tbody>
            </table>';
    }
