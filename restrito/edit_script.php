<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Alteração de Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <?php
            include "conexao.php";

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];

            //$sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome', '$endereco', '$telefone', '$email', '$data_nascimento')";
            $sql = "UPDATE `pessoas` SET `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento' WHERE  cod_pessoa = $id";


            if (mysqli_query($conn, $sql)){
                mensagem("$nome alterado com sucesso!", 'success');
            } else {
                mensagem("Não foi possível alterar.", 'danger');
            }
          ?>
          <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>