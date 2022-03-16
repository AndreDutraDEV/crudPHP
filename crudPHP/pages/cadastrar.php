<?php

require_once '../core/Conn.core.php';
include_once '../includes/Header.php';

?>





<div class="container">


    <h2 class="center">Cadastrar</h2>
    <section class="container">

   
    <div class="row">

        <div class="col s12">


            <form action="../scripts/cadastro.php" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" type="text" name="nome" class="validate" required>
                        <label for="password">nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="autor" type="text" name="descricao" class="validate" required>
                        <label for="password">descrição</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="categoria" type="text" name="categoria" class="validate" required>
                        <label for="email">categoria</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="imagem" type="text" name="imgproduto" class="validate" required>
                        <label for="email">Imagem</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="genero" type="number" name="preco" class="validate" required>
                        <label for="email">preço</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="cadastrar">Cadastrar
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