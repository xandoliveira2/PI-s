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
    <link rel="stylesheet" href="../../estilo/aluno/aluno-acompanhar.css">
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
                    <a href="#" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="aluno-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>
            
        <div class="container-content">
            <div class="content">
                <h1>Avaliações dos documentos enviados ao professor</h1>

                <form action="aluno-acompanhar.php" method="post">
                    <label for="filtro">Filtrar por:</label>
                    <select name="filtro" id="filtro">
                        <option value="null" selected>Selecione uma opção</option>
                        <option value="termocompromisso.pdf">Termo de compromisso</option>
                        <option value="relatoriofinal.pdf">Relatório final</option>
                        <option value="relatorioparcial.pdf">Relatório parcial</option>
                        <option value="termorescisão.pdf">Termo de rescisão</option>
                        <option value="sem">Retirar filtro</option>
                    </select> 
                    <input type="submit" value="Filtrar" class="btn-filtrar">
                </form> 
                
                <?php
                    if (isset($_POST['filtro'])) {
                        
                        if ($_POST['filtro'] == 'termocompromisso.pdf') {
                            $sql = "SELECT * 
                                    FROM `tb_documentos` 
                                    WHERE aluno_id = $id 
                                    ORDER BY CASE WHEN nome = 'termocompromisso.pdf' 
                                    THEN 0 ELSE 1 END, nome;";
                        
                        } elseif ($_POST['filtro'] == 'relatoriofinal.pdf') {
                            $sql = "SELECT * 
                                    FROM `tb_documentos` 
                                    WHERE aluno_id = $id 
                                    ORDER BY CASE WHEN nome = 'relatoriofinal.pdf' 
                                    THEN 0 ELSE 1 END, nome;";
                        
                        } elseif ($_POST['filtro'] == 'relatorioparcial.pdf') {
                            $sql = "SELECT * 
                                    FROM `tb_documentos` 
                                    WHERE aluno_id = $id 
                                    ORDER BY CASE WHEN nome = 'relatorioparcial.pdf' 
                                    THEN 0 ELSE 1 END, nome;";
                        
                        } elseif ($_POST['filtro'] == 'termorescisão.pdf') {
                            $sql = "SELECT * 
                                    FROM `tb_documentos` 
                                    WHERE aluno_id = $id 
                                    ORDER BY CASE WHEN nome = 'termorescisão.pdf' 
                                    THEN 0 ELSE 1 END, nome;";
                        
                        } elseif ($_POST['filtro'] == 'null' || $_POST['filtro'] == 'sem' ) {
                            $sql = "SELECT * 
                                    FROM tb_documentos 
                                    WHERE aluno_id = $id;";
                        }
                    
                    } else { $sql = "SELECT * FROM tb_documentos WHERE aluno_id = $id;"; }
                        
                    $resultado = $conexao->query($sql);
                    $lista = $resultado->fetchAll();
                ?>

                <table>
                    <tr>
                        <th>Nome do Arquivo</td>
                        <th>Status</th>
                        <th>Comentário</th>
                        <th>Ações</td>
                    </tr>
                    <?php foreach ($lista as $linha):?>
                        <tr>
                            <td><?php echo $linha['nome']?></td>
                            <td><span><?php echo $linha['status']?></span></td>
                            <td><form action="" method="post">
                                    <input type="hidden" name="<?php echo $linha['id']; ?>" value="<?php echo $linha['comentario'] ?>" id="<?php echo $linha['id']; ?>"> 
                                    <?php 
                                    if ($linha['comentario']!=NULL) { ?>
                                        <input type="submit" class="comentario" value="Comentário" onclick="exibir(<?php echo $linha['id']; ?>)"> <?php 
                                    } ?>
                            </form></td>
                            <td><a href='../documento/doc_ver_processo.php?id=<?php echo $linha["id"]?>' target='_blank'><button class="item1">Baixar documento</button></a></td>
                        </tr> 
                    <?php endforeach ?>
                </table>   
            </div>
        </div>

        <script>
            function exibir(id) {
                let comentario = document.getElementById(String(id)).value;
                if (comentario == '') { alert('Sem comentários disponível') } else { alert(comentario); }
            }
        </script>
    </main>
</body>
</html>