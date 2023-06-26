<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $nome = $_GET['nome'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $id_aluno = $_POST['id_aluno'];
    $id_disciplina = $_POST['id_disciplina'];
    $nota = $_POST['nota'];

    adicionarNotaAluno($id_aluno,$id_disciplina,$nota);
    header('Location: alunos.php');

}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Adicionar nota ao aluno <?= $nome?></title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Adicionar nota ao aluno <?= $nome?> </h2>
    <div class="container mt-5">
        <form action="adicionar_nota.php" method="post">
            <div class="form-group">
                <label>Disciplina:</label>
                <select class="form-select" name="id_disciplina" required>
                    <option value="-1" disabled selected>Selecione um disciplina</option>
                    <?php
                    $lista = listarDisciplinasDisponiveis($id);
                    foreach ($lista as $linha) {
                        $idDisciplina = $linha['id_disciplina'];
                        $nome = $linha['disciplina'];
                        $opcao = "<option value=\"$idDisciplina\">$nome</option>";
                        echo $opcao;
                    }
                    ?>
                </select>

                <label>Nota:</label>
                <input type="number" class="form-control" name="nota" required placeholder="ex: 10">
                <input type="number" class="form-control" name="id_aluno" hidden="true" value="<?= $id ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Adicionar nota</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>