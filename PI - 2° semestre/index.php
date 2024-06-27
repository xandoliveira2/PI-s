<?php
include("classes/Conexao.php");
include("views/usuarios/usuario-verifica.php");

if (isset(($_SESSION['id']))) {
    $sql = "SELECT * 
        FROM tb_usuarios 
        WHERE id = '" . $_SESSION['id'] . "';";

    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch();

    // Direciona baseado no tipo
    if ($linha['tipo'] == 'aluno') {
        header("Location:views/alunos/aluno-perfil.php");
    } else if ($linha['tipo'] == 'professor') {
        header("Location:views/professores/professor.php");
    }
}

if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
} else {
    $erro = null;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo/fonts.css">
    <link rel="stylesheet" href="estilo/index.css">
    <link rel="stylesheet" href="estilo/nav-bar.css">
    <title>Sistema de Estágio da Fatec Itapira</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
    </header>

    <main>
        <h1>Sistema de Estágio Fatec Itapira</h1>
        <form action="views/usuarios/usuario-login.php" method="POST">
            <div class="form-group">
                <label for="usuario">Login</label><br>
                <input type="text" class="input" name="usuario" id="usuario" placeholder="Digite seu usuario">
            </div>

            <div class="form-group">
                <label for="usuario">Senha</label><br>
                <input type="password" class="input" name="senha" placeholder="Digite sua senha">
            </div>

            <span style="color:red;"><?php echo $erro; ?></span>

            <div class="form-group">
                <input id="entrar" type="submit" value="Entrar">
            </div>
        </form>
    </main>
</body>

</html>