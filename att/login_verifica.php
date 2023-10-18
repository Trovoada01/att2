<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica login</title>
</head>
<body>
    <h3>VERIFICA LOGIN</h3>
    <?php
        session_start();//inicia a sessão
        $usuario    =   $_POST["usuario"];
        $senha      =   $_POST["senha"];
        require "conexao.php";
        $query = "SELECT * FROM tblogin WHERE usuario='$usuario' AND senha='$senha'"; //seleciona os dados do usuario e da senha, para verificar na tabela, esta correto
        $sql=mysqli_query($conexao, $query) or die(mysqli_error($conexao));
        $resultado=mysqli_num_rows($sql);
        // a variavel resultado fara a verificação. se o resultado for igual a 1, é porque achou o usuario na tabela 
        if($resultado == 0)
        {
            echo "Usuario ou Senha incorreta";
            echo "<meta http-equiv='refresh' content='3;url=index.html' />" ;//espera 3 segundos, e retorna a tela de login
        }
        else
        {

        $_SESSION["usuario"]    = $usuario; // Salva a variável na sessão
        $_SESSION["senha"]      = $senha;
        echo "<meta http-equiv='refresh' content='0;url=principal.php' />";
        
        }
    ?>
</body>
</html>