<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $idExcluir = $_GET['id'];
        deletarDisciplina($idExcluir);
        header('Location: disciplinas.php');
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
    <title>Disciplinas</title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Disciplinas Cadastradas</h2>
    <div class="container mt-5">
        <a href="/escola/disciplinas/cadastrar_disciplina.php" class="mt-5">
            <button class="btn btn-primary" type="button">Adicionar Disciplina</button>
        </a>
        <div class="table-responsive  mt-3">
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
                                <a title="Atualizar" href="editar_disciplina.php?id=<?=$disciplina; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                            </td>
                            <td class="text-center">
                                <?php
                                // Obter a lista de disciplinas do banco de dados
                                $disciplinas = listarDisciplinas();
                                // Verificar se a disciplina está relacionada a alguma turma
                                $relacionada = verificarDisciplinaRelacionada( $disciplina['id']);
                                error_log($relacionada);
                                // Definir o atributo "disabled" do botão de exclusão
                                $disabled = $relacionada ? 'disabled title="Não é possível excluir essa disciplina, ela está relacionada a uma turma."' : '';
                                ?>
                                <div <?=$disabled;?>>
                                    <button  href="javascript:void(0)" <?=$disabled;?> data-toggle="modal" data-target="#excluir-<?=$disciplina['id'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="excluir-<?=$disciplina['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir Disciplina</h5>
                                    </div>
                                    <div class="modal-body">Deseja realmente excluir a disciplina <?=$disciplina['nome'];?>?</div>
                                    <div class="modal-footer">
                                        <a href="disciplinas.php?id=<?=$disciplina['id'];?>"><button class="btn btn-primary btn-user" type="button">Sim</button></a>
                                        <a href="disciplinas.php"><button class="btn btn-danger btn-user" type="button">Não</button></a>

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
</body>
</html>