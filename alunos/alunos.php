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
    <title>Alunos</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Alunos Cadastrados</h2>
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
                    $alunos = listarAlunos();
                    foreach($alunos as $aluno): 
                        ?>
                        <tr>
                            <td class="text-center"><?= $aluno['id'] ?></td>
                            <td class="text-center"><?= $aluno['nome'] ?></td>
                            <td class="text-center">
                                <a title="Atualizar" href="editar_aluno.php?id=<?=$aluno['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                            </td>
                            <td class="text-center">
                                <a title="Excluir" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                            </td> 
                        </tr>
                        <div class="modal fade" id="excluir-<?=$aluno['id'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Aluno</h5>
                                    </div>
                                    <div class="modal-body">Deseja realmente excluir esta informação?</div>
                                    <div class="modal-footer">
                                        <a href="remover_aluno.php?id=<?=$aluno['id'];?>"><button class="btn btn-primary btn-user" type="button">Confirmar</button></a>
                                        <a href="ordem.php"><button class="btn btn-danger btn-user" type="button">Cancelar</button></a>

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
</body>
</html>