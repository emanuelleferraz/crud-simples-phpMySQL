<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="restrito/css/bootstrap.min.css">

    <title>Sickstem</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="jumbotron">
                    <style type="text/css">
                        .jumbotron {
                            padding: 4rem 2rem;
                            margin-bottom: 2rem;
                            background-color: var(--bs-light);
                            border-radius: .3rem;
                        }
                    </style>
                    <h1 class="display-4">Login</h1>
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
                            <small class="form-text text-muted">Entre com seus dados de acesso.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                    <?php
                        if (isset($_POST['login'])) {
                            $login = $_POST['login'];
                            $senha = md5($_POST['senha']);

                            include "restrito/conexao.php";
                            $sql = "SELECT * FROM `usuarios` WHERE login = '$login' AND senha = '$senha'";

                            if($result = mysqli_query($conn, $sql)){
                            $num_registros = mysqli_num_rows($result);

                                if ($num_registros == 1) {
                                    $linha = mysqli_fetch_assoc($result);

                                    if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                                        session_start();
                                        $_SESSION['login'] = "Robson";
                                        header("location: restrito");
                                    } else {
                                        echo "Login inválido!";
                                    }
                                } else {
                                    echo "Login ou senha não encontrados ou inválidos";
                                }
                            } else { 
                                echo "Nenhum resultado do Banco de Dados.";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>