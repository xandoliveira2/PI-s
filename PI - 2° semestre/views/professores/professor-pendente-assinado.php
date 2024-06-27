<?php
   include "../../classes/Conexao.php";
   session_start();

   $id = $_SESSION['id'];
   $sql = "SELECT * FROM tb_professores WHERE usuario_id = '{$id}'";

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
    <link rel="stylesheet" href="../../estilo/professor/professor-pendente-assinado.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <title>Página Professor</title>
</head> 
<body">
    <header>
        <div class="logo opt">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
        <div class="perfil opt">
            <ul>
                <li><a href="../professores/professor.php">Perfil de <?=$linha['nome']?></a></li>
                <li><a href="../usuarios/usuario-logout.php">Sair</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="sidebar-container">
            <div class="sidebar">
                <ul>
                    <a href="professor-pendente.php" class="sidebar-opt"><li>Documentos Pendentes</li></a>
                    <a href="professor-avaliados.php" class="sidebar-opt"><li>Documentos Avaliados</li></a>
                    <a href="#" class="sidebar-opt"><li>Assinados Pendentes</li></a>
                    <a href="professor-analisado-assinado.php" class="sidebar-opt"><li>Assinados avaliados</li></a>
                </ul>
            </div>
        </div>
        <div class="container-content">
            <div class="content">
                <h2>Documentos assinados para analise</h2>
                <form action="professor-pendente-assinado.php" method="post">
                    <label for="filtro">Filtrar por:</label>
                    <select name="filtro" id="filtro">
                        <option value="null" selected>Selecione uma opção</option>
                        <option value="termocompromisso.pdf">Termo de compromisso</option>
                        <option value="relatoriofinal.pdf">Relatório final</option>
                        <option value="relatorioparcial.pdf">Relatório parcial</option>
                        <option value="termorescisão.pdf">Termo de rescisão</option>
                        <option value="sem">Retirar filtro</option>
                    </select>   
                    <input type="submit" value="Filtrar">
                </form>
                <?php 
                if (isset($_POST['filtro'])) {
                    if ($_POST['filtro'] == 'termocompromisso.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE status = 'pendente' 
                                AND assinado = 'assinado' 
                                ORDER BY CASE WHEN nome = 'termocompromisso.pdf' 
                                THEN 0 ELSE 1 END, nome;";
                    
                    } elseif ($_POST['filtro'] == 'relatoriofinal.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE STATUS = 'pendente' 
                                AND assinado = 'assinado' 
                                ORDER BY CASE WHEN nome = 'relatoriofinal.pdf' 
                                THEN 0 ELSE 1 END, nome;";

                    } elseif ($_POST['filtro'] == 'relatorioparcial.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE STATUS = 'pendente' 
                                AND assinado = 'assinado' 
                                ORDER BY CASE WHEN nome = 'relatorioparcial.pdf' 
                                THEN 0 ELSE 1 END, nome;";

                    } elseif ($_POST['filtro'] == 'termorescisão.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE STATUS = 'pendente'
                                AND assinado = 'assinado' 
                                ORDER BY CASE WHEN nome = 'termorescisão.pdf' 
                                THEN 0 ELSE 1 END, nome;";

                    } elseif ($_POST['filtro'] == 'null' || $_POST['filtro'] == 'sem' ) {
                        $sql = "SELECT * 
                                FROM tb_documentos 
                                WHERE STATUS = 'pendente' 
                                AND assinado = 'assinado';";
                    }
                } else { 
                    $sql = "SELECT * 
                            FROM tb_documentos 
                            WHERE STATUS = 'pendente' 
                            AND assinado = 'assinado';";
                }

                $resultado = $conexao->query($sql);
                $lista = $resultado->fetchAll();
                
                foreach ($lista as $linha) {
                    $alunoid = $linha['aluno_id'];
                    $sql1 = "SELECT nome 
                            FROM tb_alunos 
                            WHERE usuario_id = $alunoid";
                    
                    $resultado = $conexao->query($sql1);
                    $resultado1 = $resultado->fetch();
                    $nomealuno = $resultado1['nome']; 
                ?>
                    <div class="documento">
                        <p><?php echo $nomealuno; ?></p>
                        <p><?php echo $linha['nome']; ?></p>
                        
                        <form action="mostrarpdf.php" method="post" target="_blank">
                            <input type="hidden" name="id_documento" value="<?php echo $linha['id']?>">
                            <input type="submit" value="documento" >
                        </form>
                        <form action="avaliar.php" method="post">
                            <input type="hidden" name="id_documento" value="<?php echo $linha['id']?>">
                            <div class="avaliar">
                                <div>
                                    <label for="aprovar">Aprovar</label>
                                    <input type="radio" name="avaliar" id="aprovar" value="aprovar">
                                </div>
                                <div>
                                    <label for="aprovar">Reprovar</label>
                                    <input type="radio" name="avaliar" id="reprovar" value="reprovar">
                                </div>    
                            </div>
                            <label for="motivo">Comentário:</label>
                            <textarea name="motivo" id="motivo"></textarea>
                            <input type="hidden" name="pag" value="1">
                            <input type="submit" value="Avaliar">
                        </form>
                    </div> <?php 
                } ?>
            </div>
        </div>
    </main>
</body>
</html>






