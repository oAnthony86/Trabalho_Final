<?php
    function listar($conexao){
        try{
            $sql = 'SELECT IDCategoria, NomeCategoria, Descricao 
                      FROM categorias';
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
                    echo '<td><a href="index.php?page=categorias&alterar='.$linha[0].'">Alterar</a>';
                    echo ' | ';
                    echo '<a href="index.php?page=categorias&deletar='.$linha[0].'">Deletar</a></td>';
                    echo '</tr>';
                }
            }
                    
        echo   '</tbody>
            </table>';
    }
