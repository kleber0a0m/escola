<nav class="navbar navbar-light bg-light  fixed-top">
    <a class="navbar-brand mx-5" href="/escola/home.php">
    <img src="/escola/assets/imagens/universidade.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Gestão Escolar
    </a>
    <ul class="nav nav-pills me-5">
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img src="/escola/assets/imagens/aluno.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                Alunos
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="/escola/alunos/alunos.php">
                        <img src="/escola/assets/imagens/listar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Listar Alunos
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <img src="/escola/assets/imagens/adicionar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Cadastrar Aluno
                    </a>
                </li>
            </ul>       
        </li>
    </ul> 

    <ul class="nav nav-pills me-5">
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img src="/escola/assets/imagens/disciplina.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                Disciplinas
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="/escola/disciplinas/disciplinas.php">
                        <img src="/escola/assets/imagens/listar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Listar Disciplinas
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <img src="/escola/assets/imagens/adicionar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Cadastrar Disciplina
                    </a>
                </li>
            </ul>       
        </li>
    </ul> 
    
    <ul class="nav nav-pills me-5">
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img src="/escola/assets/imagens/turma.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                Turmas
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="/escola/turmas/turmas.php" >
                        <img src="/escola/assets/imagens/listar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Listar Turmas
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <img src="/escola/assets/imagens/adicionar.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Cadastrar Turma
                    </a>
                </li>
            </ul>       
        </li>
    </ul>   
    
        
    <ul class="nav nav-pills me-5">
        <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <img src="/escola/assets/imagens/perfil.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                Bem-vindo <?php echo $_SESSION['usuario'];?>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="/escola/index.php">
                        <img src="/escola/assets/imagens/sair.png" width="30" height="30" class="d-inline-block align-top me-2" alt="">
                        Sair
                    </a>
                </li>
            </ul>       
        </li>
    </ul>  
</nav>