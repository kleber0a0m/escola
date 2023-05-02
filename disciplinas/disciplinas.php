<?php
require_once('../valida_session.php');
require_once('../db/database.php');
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Disciplinas</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Disciplinas Cadastradas</h2>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" data-orderable="false">Atualizar</th>
                        <th class="text-center" data-orderable="false">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $disciplinas = listarDisciplinas();
                    foreach($disciplinas as $disciplina): 
                        ?>
                        <tr>
                            <td class="text-center"><?= $disciplina['id'] ?></td>
                            <td class="text-center"><?= $disciplina['nome'] ?></td>
                            <td class="text-center">
                                <a title="Atualizar" href="editar_disciplina.php?id=<?=$disciplina['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                            </td>
                            <td class="text-center">
                                <a title="Excluir" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                            </td> 
                        </tr>
                    <?php endforeach ?>   
                </tbody>
            </table>
        </div>
                    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>