<?php

 require_once '../core/Conn.core.php';

    if(isset ($_POST['btn-deletar'])){

        $pdo = conexao::conectar();

        $sql = $pdo->prepare("DELETE FROM produto WHERE id = :id");

        $sql->bindValue(':id', $_POST['id']);

        if($sql->execute()){
            
            header('Location: ../pages/inicial.php');
            echo  "<script>alert('Email enviado com Sucesso!);</script>";
        
        }else{
            echo 'Error';
            header('Location: ../pages/inicial.php');
        }


    }







































 // if(isset($_POST['btn-delete'])){
 
//    $nome = $_POST['nome'];
//    $categoria = $_POST['categoria'];
//    $preco = $_POST['preco'];
//    $descricao = $_POST['descricao'];

//    $sql = crud::deletar($nome , $categoria,$preco, $descricao);

//    if($sql->execute()){
//        echo 'sucess';
//    }else{
//        echo 'error';
//    }
    

     
// }
