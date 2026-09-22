<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $nome = $_POST["nome"];
        $curso = $_POST["curso"];
        $turno = $_POST['turno'];

    try {

        $conexao = new PDO("mysql:host=localhost;dbname=Projeto_Dev_Poliglota;charset=utf8mb4", "root", "");

        $conexao->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO alunos (nome, curso, turno) VALUES (:nome, :curso, :turno)";

        $stmt = $conexao->prepare($sql);

        $stmt->execute([
            ':nome' => $nome,
            ':curso' => $curso,
            ':turno' => $turno
        ]);

        $mensagem = "Cadastro no MYSQL com sucesso via PDO! Aguardando o java.";
    }catch (PDOException $e){
        
        $mensagem = "Erro no cadastro: " . $e->getMessage();
    }
}

?>

