<?php

include 'conexao.php';

$nome = "";
$email = "";
$telefone = "";
$curso = "";
$data_nascimento = "";
$mensagem = "";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];
    $data_nascimento = $_POST['data_nascimento'];

    if(!empty($nome) && !empty($email) && !empty($curso) && !empty($data_nascimento) ){
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

        $mensagem = "Aluno cadastrado com sucesso!";
    }else{
        $mensagem = "Preencha todos os campos obrigatórios!";
    }

    $nome = "";
    $email = "";
    $telefone = "";
    $curso = "";
    $data_nascimento = "";
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Cadastro</title>
    <link rel="stylesheet" href="./CSS/style_index.css">
</head>
<body>

    <div class="geral">
        <h1>Cadastro de Aluno</h1>

        <?php if (!empty($mensagem)): ?>
            <div class="mensagem"><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <div class="atributo">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="atributo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="atributo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" placeholder="Ex: (11) 99999-9999" value="<?php echo htmlspecialchars($telefone, ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="atributo">
                <label for="curso">Curso</label>
                <input type="text" id="curso" name="curso" placeholder="Curso" value="<?php echo htmlspecialchars($curso, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="atributo">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($data_nascimento, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="botoes">
                <button type="submit">Cadastrar</button>
                <button type="button" onclick="window.location.href = 'consulta.php'">Consultar</button>
            </div>
        </form>
    </div>
    
</body>
</html>
