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
    <link rel="stylesheet" href="../../estilo/aluno/aluno-gerar-documento.css">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <title>Novo Documento</title>
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
                    <a href="#" class="sidebar-opt"><li>Gerar Documento</li></a>
                    <a href="aluno-novo-estagio.php" class="sidebar-opt"><li>Solicitar Estágio</li></a>
                    <a href="aluno-acompanhar.php" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="aluno-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>

        <div class="container-content">
            <div class="content">
                <div class="instrucoes">
                    <h2>Passo a passo:</h2>
                    <ol>
                        <li>Clique no botão NOVO DOCUMENTO</li>
                        <li>Selecione tipo de relatório</li>
                        <li>Clique em exibir formulário</li>
                        <li>Na nova aba, preencha todos os campos</li>
                        <li>Ao preencher todos os campos, clique em ENVIAR</li>
                        <li>Aparecerá uma foto similar a esta:</li>
                        <img src="../../img/amostra.png"></img>
                        <li>Selecione a opção "Salvar como PDF" em DESTINO</li>
                        <li>Clique em SALVAR</li>
                        <li>Envie o documento na aba "Solicitar novo estágio"</li>
                    </ol>
                </div>
                
                <div class="botao">
                    <button id="mostrar">Novo documento</button>
                </div>

                <div class="modal">
                    <label for="estagio-opcoes">Selecione tipo do documento</label>
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
            </div>
        </div>
    </main>
    <script>
        document.getElementById("mostrar").addEventListener("click", function() {
            document.querySelector('.modal').style.display = "flex"
        })

        document.querySelector('.close').addEventListener("click", function() {
            document.querySelector('.modal').style.display = "none"
        })

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
</div>
</body>
</html>