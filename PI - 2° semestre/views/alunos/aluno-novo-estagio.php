<?php
   include "../../classes/Conexao.php";
   
   session_start();
   $id = $_SESSION['id'];
   $sql = "SELECT * FROM tb_alunos WHERE usuario_id = '{$id}'";
   
   $resultado = $conexao->query($sql);
   $linha = $resultado->fetch();   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../estilo/fonts.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/aluno/aluno-novo-estagio.css">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <title>Página Aluno</title>
</head>
<body>
    <header>
        <div class="logo opt">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
        <div class="perfil opt">
            <ul>
                <li><a href="aluno-perfil.php">Perfil de <?=$linha['nome']?></a></li>
                <li><a href="../usuarios/usuario-logout.php">Sair</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="sidebar-container">
            <div class="sidebar">
                <ul>
                    <a href="aluno-gerar-documento.php" class="sidebar-opt"><li>Gerar Documento</li></a>
                    <a href="#" class="sidebar-opt"><li>Solicitar Estágio</li></a>
                    <a href="aluno-acompanhar.php" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="aluno-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>
        
        <div class="container-content">
            <div class="content">
                <h1>Passos para solicitar o novo estágio</h1>
                <ol class="solicitacao-passos">
                    <li>Escolher arquivo .pdf previamente criado na aba "Gerar novo documento"</li>
                    <li>Escolher na tabela o nome do documento que vai enviar</li>
                    <li>Clicar no botão "Enviar Documento"</li>
                    <li>OBS: caso vá mandar documento já com as assinaturas, selecionar a caixinha "assinatura".</li>
                </ol>
                <h1>Upload de Documento</h1>
                <form action="../../funcoes/upload.php" method="POST" enctype="multipart/form-data">
                    <label for="documento">Selecione um arquivo PDF:</label><br>
                    <input type="file" name="documento" accept="application/pdf" required id="documento">
                    <br><br>
                    <h2>Nome do documento que você vai enviar:</h2>
                    <br>
                    <select name="documentonome" id="documentonome" required>
                        <option value="" selected>Escolha uma opção</option>
                        <option value="termocompromisso.pdf">Termo de compromisso e plano de atividades</option>
                        <option value="relatorioparcial.pdf">Relatório parcial</option>
                        <option value="relatoriofinal.pdf">Relatório Final</option>
                        <option value="termorescisão.pdf">Termo de rescisão</option>
                    </select>
                    <div class="assinatura">
                        <input type="checkbox" name="assinatura" id="assinatura">
                        <label for="assinatura">Assinatura</label>
                    </div>
                    <br><br>
                    <input type="submit" id="enviar" value="Enviar Documento">
                </form>
            </div>
        </div>
    </main>
</body>
</html>