<?php

require_once '../core/Conn.core.php';
include_once '../includes/Header.php';

?>



<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light center">Produtos</h3>
        <table class="striped">
            <thead>
                <th>Nome:</th>
                <th>descrição:</th>
                <th>preço:</th>
                <th>categoria:</th>
                <th>Imagem:</th>

            </thead>
            <tbody>
                <?php
                $pdo = conexao::conectar();
                $sql = $pdo->prepare('SELECT * FROM  produto   ');
                $sql->execute();
                $resultado =  $sql->fetchAll(PDO::FETCH_OBJ);

                if ($sql->rowCount() > 0) {
                    foreach ($resultado as $cliente) {
                ?>

                        <tr>
                            <td><?php echo $cliente->nome_produto; ?></td>
                            <td><?php echo $cliente->descricao; ?></td>
                            <td><?php echo $cliente->preco; ?></td>
                            <td><?php echo $cliente->categoria; ?></td>
                            <td><?php echo $cliente->imgproduto; ?></td>
                            <td>
                                <a class="waves-effect waves-light btn modal-trigger orange" href="./edit.php?id=<?php echo $cliente->id ?>"><i class="material-icons">edit</i></a>
                            <td><a href="#modal<?php echo $cliente->id ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                            <!-- Modal Structure -->
                            <div id="modal<?php echo $cliente->id ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse item?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="../scripts/delet.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $cliente->id ?>">
                                        <button type="submit" name="btn-deletar" class="btn red">Deletar</button>
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                            </div>

                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <a href="cadastrar.php"><button class="btn btn-primary">Cadastra</button></a>

    </div>



    <?php

    include_once '../includes/Footer.php';


    ?>