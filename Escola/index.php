<?php

include 'conexao.php';

$nome = "";
$email = "";
$telefone = "";
$curso = "";
$data_nascimento = "";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];
    $data_nascimento = $_POST['data_nascimento'];
}

$sql = "INSERT INTO alunos 
        (nome,email,telefone,curso,data_nascimento)
        VALUES  (:nome, :email, :telefone, :curso, :data_nascimento)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'curso' => $curso,
    'data_nascimento' => $data_nascimento,
]);

$sql = "SELECT * FROM alunos";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(
    PDO::FETCH_ASSOC
);

foreach ($alunos as $aluno) {
    htmlspecialchars($aluno["id"], ENT_QUOTES, 'UTF-8') . "\n";
    htmlspecialchars($aluno["nome"], ENT_QUOTES, 'UTF-8') ."\n";
    htmlspecialchars($aluno["email"], ENT_QUOTES, 'UTF-8') ."\n";
    htmlspecialchars($aluno["telefone"], ENT_QUOTES, 'UTF-8') ."\n";
    htmlspecialchars($aluno["curso"], ENT_QUOTES, 'UTF-8') ."\n";
    $aluno["data_nascimento"];
    }

echo "Aluno cadastrado!";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola</title>
</head>
<body>

    <form action = "index.php" method = "POST">

        <input type="text" name="nome" placeholder="Nome" value ="<?php echo $nome; ?>">

        <input type="text" name="email" placeholder="Email" value ="<?php echo $email; ?>">

        <input type="text" name="telefone" placeholder="Telefone" value ="<?php echo $telefone; ?>">

        <input type="text" name="curso" placeholder="Curso" value ="<?php echo $curso; ?>">

        <input type="date" name="data_nascimento" placeholder="Data de Nascimento" value ="<?php echo $data_nascimento; ?>">

        <button type= "submit">Cadastrar</button>
        <button type="button" onclick="window.location.href = 'consulta.php'"> Consultar </button>

    </form>

</body>
</html>
