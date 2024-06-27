<?php
   include "../../classes/Conexao.php";
   session_start();

   $id = $_SESSION['id'];
   $sql = "SELECT * 
            FROM tb_alunos 
            WHERE usuario_id = '{$id}'";
   
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
    <link rel="stylesheet" href="../../estilo/aluno/aluno-perfil.css">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <title>Perfil do Aluno <?=$linha['nome']?></title>
</head>
<body>
    <header>
        <div class="logo opt">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
        <div class="perfil opt">
            <ul>
                <li><a href="#">Perfil de <?=$linha['nome']?></a></li>
                <li><a href="../usuarios/usuario-logout.php">Sair</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="sidebar-container">
            <div class="sidebar">
                <ul>
                    <a href="aluno-gerar-documento.php" class="sidebar-opt"><li>Gerar Documento</li></a>
                    <a href="aluno-novo-estagio.php" class="sidebar-opt"><li>Solicitar Estágio</li></a>
                    <a href="aluno-acompanhar.php" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="aluno-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>
        
        <div class="container-content">
            <div class="content">
                <h1>Bem vindo <?=$linha['nome']?>. Seus dados:</h1>
                <div class="dados-aluno">
                    <h2><?php echo "RA: ".$linha['ra'].""; ?></h2>
                    <h2><?php echo "Nome: ".$linha['nome'].""; ?></h2>
                    <h2><?php echo "Disciplina: ".$linha['curso'].""; ?></h2>
                </div>

                <!--<div class="upload-doc">
                    <h1>Upload de Documento</h1>
                    
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <h2>Selecione um arquivo PDF:</h2>
                        <input type="file" name="documento" id="selecionar-doc" accept="application/pdf" required>
                        <br>
                        <br>
                        <input type="submit" value="Enviar Documento" id="enviar-doc">
                    </form>

                    <button id="mostrar">Novo documento</button>
                    <div class="modal">
                        <label for="estagio-opcoes" >Selecione tipo do documento</label>
                        <select name="estagio-opcoes" id="estagio-opcoes">
                            <option value="" selected>Selecione uma opção</option>
                            <option value="OR">Obrigatório Remunerado</option>
                            <option value="ONR">Obrigatório Não Remunerado</option>
                            <option value="RP">Relatório Parcial</option>
                            <option value="RF">Relatório Final</option>
                            <option value="TR">Termo de rescisão</option>
                        </select>
                        <button onclick="obterValorSelect()"> Exibir formulário</button>
                        <button class="close">Exlcuir</button>
                    </div>  
                </div> -->
            </div> 
        </div>        
    </main>
</body>
<script>
    document.getElementById("mostrar").addEventListener("click",function() {
        document.querySelector('.modal').style.display = "flex";
    })
    
    document.querySelector('.close').addEventListener("click", function() {
        document.querySelector('.modal').style.display = "none";
    });
    
    function obterValorSelect() {
        var select=document.getElementById("estagio-opcoes").value

        if (select=="ONR"){
            window.location.href = "../form/formONR.php"
    
        } else if (select == "OR"){
            window.location.href = "../form/formOR.php"
        
        } else if (select == "RP"){
            window.location.href = "../form/formRP.php"
        
        } else if (select == "RF"){
            window.location.href = "../form/formRF.php"
        
        } else if(select == "TR"){
            window.location.href = "../form/formTR.php"
        
        } else{
            alert("Selecione uma opção válida")
        }
    }
</script>
</html>