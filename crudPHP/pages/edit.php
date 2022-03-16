<?php

require_once '../core/Conn.core.php';
include_once '../includes/Header.php';

?>





<div class="container">


    <h2 class="center">Editar</h2>
    <section class="container">

   
    <div class="row">

    <?php
    
    if(isset ($_GET['id'])){

        $pdo = conexao::conectar();
        
        $sql = $pdo->prepare('SELECT * FROM produto WHERE id = :id');
        $sql->bindValue(':id',$_GET['id']);
        $sql->execute();
        $produto = $sql->fetch(PDO::FETCH_OBJ);
    }
    
    
    ?>


        <div class="col s12">


            <form action="../scripts/edicao.php" method="POST" class="col s12">
                 <div class="row">
            <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
               
                   
                    <div class="input-field col s12">
                         
                        <input id="nome" type="text" name="nome" class="validate" required value="<?php echo $produto->nome_produto;?>" >
                        <label for="password">nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="autor" type="text" name="descricao" class="validate" required value="<?php echo $produto->descricao;?>">
                        <label for="password">descrição</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="img" type="text" name="categoria" class="validate" required value="<?php echo $produto->categoria;?>">
                        <label for="email">categoria</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="img" type="text" name="imgproduto" class="validate" required value="<?php echo $produto->categoria;?>">
                        <label for="email">Imagem</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="genero" type="number" name="preco" class="validate" required value="<?php echo $produto->preco;?>">
                        <label for="email">preço</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="editar">Editar
                    <i class="material-icons right">send</i>
                </button>

        </div>
    </div>
</div> 
</section>
</form>
</div>





<?php

include_once '../includes/Footer.php';


?>