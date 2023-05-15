<?php
require_once("conecta_db.php");
function verificarLogin($usuario, $senha){
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = $conexao->prepare("select * from usuarios where usuario = ? and senha = ?");
    $query->bindParam(1,$usuario);
    $query->bindParam(2,$senhaMd5);
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

// Aluno

function cadastrarAluno($nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("INSERT INTO alunos (nome) VALUES ('$nome')");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function listarAlunos(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM alunos");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

function listarAlunosQuenNaoEstaoNaTurma($turma){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM alunos WHERE ISNULL(alunos.id_turma)");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}
function listarAlunoPorId($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM alunos WHERE ID='$id'");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function deletarAluno($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("DELETE FROM alunos WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function editarAluno($id,$nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE alunos SET nome='$nome' WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

// Disciplina

function cadastrarDisciplina($nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("INSERT INTO disciplinas (nome) VALUES ('$nome')");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function listarDisciplinas(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM disciplinas");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}
function listarDisciplinaPorId($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM disciplinas WHERE ID='$id'");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function deletarDisciplina($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("DELETE FROM disciplinas WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function editarDisciplina($id,$nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE disciplinas SET nome='$nome' WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

function verDisciplinasTurma($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT d.id AS 'id_disciplina', d.nome
FROM disciplinas AS d
INNER JOIN turmas_disciplinas AS td
ON d.id = td.id_disciplina
INNER JOIN turmas AS t
ON t.id = td.id_turma
WHERE td.id_turma = $id");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

function listarDisciplinaQueNaoEstaoNaTurma($id_turma) {
    $conexao = conecta_bd();

    $query = $conexao->prepare("
        SELECT d.*
        FROM disciplinas d
        WHERE NOT EXISTS (
            SELECT 1
            FROM turmas_disciplinas td
            WHERE td.id_disciplina = d.id
            AND td.id_turma = :id_turma
        )
    ");
    $query->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $query->execute();

    $disciplinas = $query->fetchAll(PDO::FETCH_ASSOC);
    return $disciplinas;
}

// Turma

function cadastrarTurma($nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("INSERT INTO turmas (nome) VALUES ('$nome')");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function listarTurmas(){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM turmas");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}
function listarTurmaPorId($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("select * FROM turmas WHERE ID='$id'");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function deletarTurma($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("DELETE FROM turmas WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function removerAlunoTurma($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE alunos SET id_turma=NULL WHERE id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}
function editarTurma($id,$nome){
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE turmas SET nome='$nome' WHERE  id=$id;");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

function verAlunosTurma($id){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT alunos.id AS 'id_aluno', alunos.nome,turmas.id AS 'id_turma', turmas.nome AS 'nome_turma' FROM alunos,turmas WHERE alunos.id_turma = turmas.id AND turmas.id = $id");
    $query->execute();
    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
}

function adicionarAlunoTurma($id_aluno,$id_turma){
    error_log("klebner");
    error_log("UPDATE alunos SET id_turma=$id_turma WHERE id=$id_aluno");
    $conexao = conecta_bd();
    $query = $conexao->prepare("UPDATE alunos SET id_turma=$id_turma WHERE id=$id_aluno");
    $query->execute();
    $retorno = $query->fetch(PDO::FETCH_ASSOC);
    return $retorno;
}

function adicionarDisciplinaTurma($id_disciplina, $id_turma) {
    $conexao = conecta_bd();

    // Verifica se a disciplina já está associada à turma
    $query_verifica = $conexao->prepare("SELECT COUNT(*) AS total FROM turmas_disciplinas WHERE id_disciplina = :id_disciplina AND id_turma = :id_turma");
    $query_verifica->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_INT);
    $query_verifica->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $query_verifica->execute();
    $resultado = $query_verifica->fetch(PDO::FETCH_ASSOC);

    // Se a disciplina já estiver associada à turma, retorna false
    if ($resultado['total'] > 0) {
        return false;
    }

    // Insere um novo registro na tabela turmas_disciplinas
    $query_inserir = $conexao->prepare("INSERT INTO turmas_disciplinas (id_turma, id_disciplina) VALUES (:id_turma, :id_disciplina)");
    $query_inserir->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $query_inserir->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_INT);
    $query_inserir->execute();

    // Retorna o número de linhas afetadas na tabela turmas_disciplinas
    $num_linhas_afetadas = $query_inserir->rowCount();
    return $num_linhas_afetadas;
}

function removerDisciplinaTurma($id_disciplina, $id_turma) {
    $conexao = conecta_bd();

    $query = $conexao->prepare("DELETE FROM turmas_disciplinas WHERE id_disciplina = :id_disciplina AND id_turma = :id_turma");
    $query->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_INT);
    $query->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $query->execute();

    return $query->rowCount() > 0; // retorna true se algum registro foi excluído
}

function verificarDisciplinaRelacionada($id_disciplina) {
    $db = conecta_bd();

    // Verifica se a disciplina está relacionada a alguma turma
    $stmt = $db->prepare('SELECT COUNT(*) FROM turmas_disciplinas WHERE id_disciplina = ?');
    $stmt->bindParam(1, $id_disciplina);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    return $result > 0;
}

?>