<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $idExcluir = $_GET['id'];
        deletarAluno($idExcluir);
        header('Location: alunos.php');
    }
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
    <title>Alunos</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Alunos Cadastrados</h2>

    <div class="container mt-5">
        <a href="/escola/alunos/cadastrar_aluno.php" class="mt-5">
            <button class="btn btn-primary" type="button">Adicionar Aluno</button>
        </a>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Matrícula</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" >Ver boletim</th>
                        <th class="text-center" >Adicionar nota</th>
                        <th class="text-center" data-orderable="false">Atualizar</th>
                        <th class="text-center" data-orderable="false">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $alunos = listarAlunos();
                    foreach($alunos as $aluno):
                        ?>
                        <tr>
                            <td class="text-center"><?= $aluno['id'] ?></td>
                            <td class="text-center"><?= $aluno['nome'] ?></td>
                            <td class="text-center">
                                <a title="Ver Boletim" href="boletim_aluno.php?id=<?=$aluno['id']; ?>&nome=<?=$aluno['nome']; ?>"  class="btn btn-sm btn-secondary"><i class="fas fa-trash-alt">&nbsp;</i>Ver Boletim</a>
                            </td>
                            <td class="text-center">
                                <a title="Adicionar nota" href="adicionar_nota.php?id=<?=$aluno['id']; ?>&nome=<?=$aluno['nome']; ?>"  class="btn btn-sm btn-secondary"><i class="fas fa-trash-alt">&nbsp;</i>Adicionar nota</a>
                            </td>
                            <td class="text-center">
                                <a title="Atualizar" href="editar_aluno.php?id=<?=$aluno['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                            </td>
                            <td class="text-center">
                                <a title="Excluir" href="javascript(void)" data-toggle="modal" data-target="#excluir-<?=$aluno['id'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="excluir-<?=$aluno['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Aluno</h5>
                                    </div>
                                    <div class="modal-body">Deseja realmente excluir o aluno(a) <?=$aluno['nome'];?>?</div>
                                    <div class="modal-footer">
                                        <a href="alunos.php?id=<?=$aluno['id'];?>"><button class="btn btn-primary btn-user" type="button">Sim</button></a>
                                        <a href="alunos.php"><button class="btn btn-danger btn-user" type="button">Não</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>   
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></body>
</html>