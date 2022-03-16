<?php

 require_once '../core/Conn.core.php';

    if(isset ($_POST['editar'])){
  
         $nome = $_POST['nome'];
         $descricao = $_POST['descricao'];
         $categoria = $_POST['categoria'];
         $preco = $_POST['preco'];
         $imgproduto = $_POST['imgproduto'];


        $pdo = conexao::conectar();

      
       

    $sql = crud::editar($nome, $descricao, $categoria, $preco, $imgproduto);

        if($sql->execute()){
            
            header('Location: ../pages/inicial.php');
            echo  "<script>alert('Email enviado com Sucesso!);</script>";
        
        
        }else{
            echo 'Error';
            header('Location: ../pages/inicial.php');
        }


    }
