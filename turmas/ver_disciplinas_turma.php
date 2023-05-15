<?php
require_once('../valida_session.php');
require_once('../db/database.php');

if (isset($_GET['acao'])) {
    if($_GET['acao'] == 'ver_disciplinas') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $disciplinas = verDisciplinasTurma($idTurma);
    }

    if($_GET['acao'] == 'adicionar_disciplina') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $idDisciplina = $_GET['id_disciplina'];
        adicionarDisciplinaTurma($idDisciplina,$idTurma);
        $disciplinas = verDisciplinasTurma($idTurma);
    }

    if($_GET['acao'] == 'remover_disciplina_turma') {
        $idTurma = $_GET['id_turma'];
        $nomeTurma = $_GET['nome_turma'];
        $idDisciplina = $_GET['id_disciplina'];
        removerDisciplinaTurma($idDisciplina,$idTurma);
        $disciplinas = verDisciplinasTurma($idTurma);
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
    <title>Disciplinas da turma de <?= $nomeTurma ?>></title>
</head>
<body>
<?php
include '../menu.php';
?>
<h2 class="text-center h2 mt-3" style="padding-top: 66px;">Disciplinas da turma de <?= $nomeTurma ?></h2>
<div class="container mt-5">
    <button  href="javascript(void)" data-toggle="modal" data-target="#adicionar_disciplina_turma"  class="btn btn-primary" type="button">Adicionar Disciplina nesta turma</button>
    <div class="table-responsive mt-3">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Nome</th>
                <th class="text-center" data-orderable="false">Remover disciplina</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($disciplinas as $disciplina):
                ?>
                <tr>
                    <td class="text-center"><?= $disciplina['id_disciplina'] ?></td>
                    <td class="text-center"><?= $disciplina['nome'] ?></td>
                    <td class="text-center">
                        <a href="javascript(void)" data-toggle="modal" data-target="#remover_disciplina_turma-<?=$disciplina['id_disciplina'];?>" class="btn btn-sm btn-danger">Remover disciplina da turma</a>
                    </td>
                </tr>
                <div class="modal fade" id="remover_disciplina_turma-<?=$disciplina['id_disciplina'];?>" tabindex="-1" role="dialog" aria-labelledby="removerDisciplinaModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="removerDisciplinaModalLabel">Remover disciplina</h5>
                            </div>
                            <div class="modal-body">Deseja realmente remover o disciplina <?=$disciplina['nome'];?> da turma <?=$nomeTurma;?>?</div>
                            <div class="modal-footer">
                                <a href="ver_disciplinas_turma.php?acao=remover_disciplina_turma&id_turma=<?= $idTurma ?>&nome_turma=<?=$nomeTurma;?>&id_disciplina=<?=$disciplina['id_disciplina'];?>"><button class="btn btn-primary btn-user" type="button">Sim</button></a>
                                <button class="btn btn-danger btn-user" type="button" data-dismiss="modal">Não</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
        <?php
        if(count($disciplinas) == 0){
            echo '<h5 class="text-center h5" > Nenhum disciplina nesta turma. </h5>';
        }
        ?>
        <div class="modal fade" id="adicionar_disciplina_turma" tabindex="-1" role="dialog" aria-labelledby="#adicionar_disciplina_turma" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adicionarDisciplinaModalLabel">Adicionar disciplina existente na turma <?= $nomeTurma ?></h5>
                    </div>
                    <form action="ver_disciplinas_turma.php" method="get">
                        <input type="hidden" name="acao" value="adicionar_disciplina">
                        <input type="hidden" name="id_turma" value="<?= $idTurma ?>">
                        <input type="hidden" name="nome_turma" value="<?= $nomeTurma ?>">
                        <div class="modal-body">
                            <h6>Selecione um disciplina existente ou <a href="/escola/disciplinas/cadastrar_disciplina.php">adicione um novo</a></h6>
                            <select class="form-select" name="id_disciplina">
                                <option value="-1" disabled selected>Selecione um disciplina</option>
                                <?php
                                $lista = listarDisciplinaQueNaoEstaoNaTurma($idTurma);
                                foreach ($lista as $linha) {
                                    $idDisciplina = $linha['id'];
                                    $nome = $linha['nome'];
                                    $opcao = "<option value=\"$idDisciplina\">$nome</option>";
                                    echo $opcao;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-user" type="button" data-dismiss="modal">Voltar</button>
                            <button class="btn btn-primary btn-user" type="submit">Adicionar Disciplina</button>
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