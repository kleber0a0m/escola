<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestão Escolar</title>
</head>
<body>
    <img src="/escola/assets/imagens/universidade.png" width="100" height="100" class="d-block mx-auto mt-5" alt="">
    <h1 class="container text-center mt-3">Gestão Escolar</h1>
    <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form class="container mt-5" action="valida_login.php" method="post">
            <div class="mb-3 row">
                <label for="usuario" class="col-form-label">Usuário:</label>
                <input type="text" class="form-control " name="usuario">
            </div>

            <div class="mb-3 row">
                <label for="senha" class="col-form-label">Senha:</label>
                <input type="password" class="form-control" name="senha">
            <button type="submit" class="btn btn-primary btn-user btn-block mt-5 w-25 d-block mx-auto">
                Acessar
            </button>  
        </form>
    </div>
    <div class="col-4"></div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>