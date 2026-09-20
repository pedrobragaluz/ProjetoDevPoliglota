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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Poliglota - PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

</head>

<body class="bg-slate-950 p-8">

    <div class="max-w-md mx-auto bg-slate-900 shadow-x1 border border-slate-700 rounded-x1 p-6">

        <h2 class="text-xl font-bold mb-4 text-slate-400">Sistema Poliglota(PHP + PDO)</h2>

        <form method="post">

            <div class="mb-4">
                <label class="block text-slate-300 font-medium">Nome:</label>
                <input type="text" name="nome" required class="w-full p-2 bg-slate-900 border border-slate-600 rounded-md text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">

            </div>

            <div class="mb-4">
                <label class="block text-slate-300 font-medium">Curso:</label>
                <input type="text" name="curso" required class="w-full p-2 bg-slate-900 border border-slate-600 rounded-md text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">

            </div>

             <div class="mb-4">
                <label class="block text-slate-300 font-medium">Turno:</label>
                <input type="text" name="turno" required class="w-full p-2 bg-slate-900 border border-slate-600 rounded-md text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-colors shadow-sm">Cadastrar</button>
        </form>

        <?php if($mensagem): ?>

            <p class="mt-4 text-green-600 text-sm"><?= $mensagem ?></p>
        <?php endif; ?>

    </div>
    
</body>

</html>