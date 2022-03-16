<?php
date_default_timezone_set('America/Sao_Paulo');

abstract class conexao
{

    const host = 'localhost';
    const user = 'root';
    const dbname = 'loja';
    const password = '';






    static function conectar()
    {
        try {
            $pdo = new PDO('mysql:host=' . self::host . ";dbname=" . self::dbname . ";charset=utf8", self::user, self::password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

abstract class  crud
{


    static function listar()
    {
        try {
            $pdo = conexao::conectar();
            $listar = $pdo->prepare('SELECT * FROM produto');

            $listar->execute();
            $listar = $listar->fetchAll(PDO::FETCH_OBJ);
            return $listar;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    static function deletar($nome, $categoria, $preco, $descricao, $imgproduto)
    {
        try {
            $pdo = conexao::conectar();
            $deletar = $pdo->prepare('DELETE FROM  produto WHERE id=:id');
            $deletar->bindValue(':nome_produto', $nome);
            $deletar->bindValue(':categoria', $categoria);
            $deletar->bindValue(':preco', $preco);
            $deletar->bindValue(':descricao', $descricao);
            $deletar->bindValue(':imgproduto', $imgproduto);
            $deletar->bindValue(':id', $_POST['id']);

            $deletar->execute();

            return $deletar;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    static function inserir($nome, $descricao, $categoria, $preco, $imgproduto)
    {
        try {
            $pdo = conexao::conectar();
            $insert = $pdo->prepare('INSERT INTO `produto` ( `nome_produto`, `descricao`, `categoria`, `preco`, `imgproduto`) VALUES  (:nome_produto,:descricao,:categoria,:preco,:imgproduto)');
            $insert->bindValue(':nome_produto', $nome);
            $insert->bindValue(':descricao', $descricao);
            $insert->bindValue(':categoria', $categoria);
            $insert->bindValue(':imgproduto', $imgproduto);
            $insert->bindValue(':preco', $preco);

            
            return $insert;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }



    static function editar($nome, $descricao, $categoria, $preco, $imgproduto)
    {
        try {
            $pdo = conexao::conectar();
            $insert = $pdo->prepare('UPDATE produto SET nome_produto = :nome_produto, descricao = :descricao, categoria = :categoria, preco = :preco, imgproduto = :imgproduto WHERE id = :id;');
            $insert->bindValue(':id', $_POST['id']);
            $insert->bindValue(':nome_produto', $nome);
            $insert->bindValue(':descricao', $descricao);
            $insert->bindValue(':categoria', $categoria);
            $insert->bindValue(':preco', $preco);
            $insert->bindValue(':imgproduto', $imgproduto);


            
            return $insert;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }










}
