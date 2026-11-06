<?php

include 'conexao.php';

$sql = "SELECT * FROM alunos";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(
    PDO::FETCH_ASSOC
);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - Alunos Cadastrados</title>
    <link rel="stylesheet" href="./CSS/style_consulta.css">
</head>
<body>

    <div class="geral">
        <h1>Alunos Cadastrados</h1>

        <?php if (!empty($alunos)): ?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Data Nascimento</th>
                            <th>Criado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $aluno): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aluno["id"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["nome"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["email"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["telefone"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["curso"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["data_nascimento"], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($aluno["criado_em"], ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="vazio">Nenhum aluno cadastrado ainda.</p>
        <?php endif; ?>

        <div class="action">
            <a href="index.php" class="voltar">Cadastro</a>
        </div>
    </div>

</body>
</html>