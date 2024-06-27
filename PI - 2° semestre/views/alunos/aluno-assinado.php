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
    <title>Página Aluno</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../estilo/fonts.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/aluno/aluno-assinado.css">
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
                    <a href="aluno-novo-estagio.php" class="sidebar-opt"><li>Solicitar Estágio</li></a>
                    <a href="aluno-acompanhar.php" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="#" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>

        <div class="container-content">
            <div class="content">
                <h1>Acompanhe os documentos enviados para o professor</h1>
                
                    <?php
                        $sql = "SELECT * FROM tb_documentos 
                                WHERE aluno_id = $id 
                                and assinado = 'assinado' 
                                and status = 'aprovado';";

                        $resultado = $conexao->query($sql);
                        $lista = $resultado->fetchAll();
                    ?>
                        <?php foreach ($lista as $linha) { ?>
                                <div class="item-container">
                                    <div class="item">
                                        <h2>Nome do arquivo: <?php echo $linha['nome'] ?></h2>
                                        <a href='../documento/doc_ver_processo.php?id=<?php echo $linha["id"] ?>' target='_blank'>
                                            <button>Baixar documento</button>
                                        </a>
                                        <h2>Status: <?php echo $linha['status'] ?></h2>
                                    </div>
                                    <div class="item">
                                        <form action="" method="post">
                                            <input type="hidden" name="<?php echo $linha['id'];?>" value="<?php echo $linha['comentario']?>" id="<?php echo $linha['id'];?>"> 
                                            <?php 
                                            if ($linha['comentario']!=NULL) { ?>
                                                <input type="submit" value="Comentário" onclick="exibir(<?php echo $linha['id'];?>)"> <?php 
                                            } ?>
                                        </form>
                                    </div>
                                </div> 
                        <?php } ?>
                </div>
            </div>
        </div>
    </main>
<script>
    function exibir(id){
        let comentario = document.getElementById(String(id)).value;
        if (comentario == ''){alert('Sem comentários disponível')}
        else{
        alert(comentario);
        }
    }

</script>
</body>
</html>