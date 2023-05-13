<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if (isset($_GET['acao'])) {
    if($_GET['acao'] == 'ver_alunos') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $alunos = verAlunosTurma($idTurma);
    }

    if($_GET['acao'] == 'adicionar_aluno') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $idAluno = $_GET['id_aluno'];
        adicionarAlunoTurma($idAluno,$idTurma);
        $alunos = verAlunosTurma($idTurma);
    }

    if($_GET['acao'] == 'remover_aluno_turma') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $idAluno = $_GET['id_aluno'];
        removerAlunoTurma($idAluno);
        $alunos = verAlunosTurma($idTurma);
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
    <title>Alunos da turma de <?= $nomeTurma ?>></title>
</head>
<body>
    <?php
        include '../menu.php';
    ?>
    <h2 class="text-center h2 mt-3" style="padding-top: 66px;">Alunos da turma de <?= $nomeTurma ?></h2>
    <div class="container mt-5">
        <button  href="javascript(void)" data-toggle="modal" data-target="#adicionar_aluno_turma"  class="btn btn-primary" type="button">Adicionar Aluno nesta turma</button>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Matrícula</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center" data-orderable="false">Remover aluno</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($alunos as $aluno):
                        ?>
                        <tr>
                            <td class="text-center"><?= $aluno['id_aluno'] ?></td>
                            <td class="text-center"><?= $aluno['nome'] ?></td>
                            <td class="text-center">
                                <a href="javascript(void)" data-toggle="modal" data-target="#remover_aluno_turma-<?=$aluno['id_aluno'];?>" class="btn btn-sm btn-danger">Remover aluno da turma</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="remover_aluno_turma-<?=$aluno['id_aluno'];?>" tabindex="-1" role="dialog" aria-labelledby="removerAlunoModalLabel" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="removerAlunoModalLabel">Remover aluno</h5>
                                    </div>
                                    <div class="modal-body">Deseja realmente remover o aluno <?=$aluno['nome'];?> da turma <?=$nomeTurma;?>?</div>
                                    <div class="modal-footer">
                                        <a href="ver_alunos_turma.php?acao=remover_aluno_turma&id_turma=<?= $idTurma ?>&nome_turma=<?=$nomeTurma;?>&id_aluno=<?=$aluno['id_aluno'];?>"><button class="btn btn-primary btn-user" type="button">Sim</button></a>
                                        <button class="btn btn-danger btn-user" type="button" data-dismiss="modal">Não</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>   
                </tbody>
            </table>
            <?php
            if(count($alunos) == 0){
                echo '<h5 class="text-center h5" > Nenhum aluno nesta turma. </h5>';
            }
            ?>
            <div class="modal fade" id="adicionar_aluno_turma" tabindex="-1" role="dialog" aria-labelledby="adicionarAlunoModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adicionarAlunoModalLabel">Adicionar aluno existente na turma <?= $nomeTurma ?></h5>
                        </div>
                        <form action="ver_alunos_turma.php" method="get">
                            <input type="hidden" name="acao" value="adicionar_aluno">
                            <input type="hidden" name="id_turma" value="<?= $idTurma ?>">
                            <input type="hidden" name="nome_turma" value="<?= $nomeTurma ?>">
                            <div class="modal-body">
                            <h6>Selecione um aluno existente ou <a href="/escola/alunos/cadastrar_aluno.php">adicione um novo</a></h6>
                                <select class="form-select" name="id_aluno">
                                    <option value="-1" disabled selected>Selecione um aluno</option>
                                    <?php
                                    $lista = listarAlunosQuenNaoEstaoNaTurma($idTurma);
                                    foreach ($lista as $linha) {
                                        $idAluno = $linha['id'];
                                        $nome = $linha['nome'];
                                        $opcao = "<option value=\"$idAluno\">$nome</option>";
                                        echo $opcao;
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-user" type="button" data-dismiss="modal">Voltar</button>
                            <button class="btn btn-primary btn-user" type="submit">Adicionar Aluno</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></body>
</body>
</html>