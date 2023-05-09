<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $idEditar = $_GET['id'];
        $disciplina = listarDisciplinaPorId($idEditar);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $disciplina = listarDisciplinaPorId($idEditar);
    $nome = $_POST['nome'];
    editarDisciplina($id,$nome);
    header('Location: disciplinas.php');
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
    <title>Editar Disciplina</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Editar Disciplina</h2>
    <div class="container mt-5">
        <form action="editar_disciplina.php" method="post">
            <div class="form-group">
                <label>Id:</label>
                <input type="text" class="form-control" name="id" value="<?= $disciplina['id'] ?>" readonly placeholder="id">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" value="<?= $disciplina['nome'] ?>" required placeholder="Digite o nome da disciplina">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Editar Disciplina</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>