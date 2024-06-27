<?php
   include "classes/Conexao.php";
   //Pega o id enviado pelo header
   $id = $_GET['id'];
   $sql = "SELECT * FROM tb_alunos WHERE
            id = '{$id}'";
   $resultado = $conexao->query($sql);
   $linha = $resultado->fetch();
   






   $stmt = $conexao->query("SELECT * FROM tb_documentos WHERE
   aluno_id = '{$id}'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina Professor (Visualizar Documentos)</h1>
    <?php echo "<h3> Documentos de ". $linha['nome']."</h3>" ?>
    
   

<a href="views/usuarios/usuario-logout.php"><button> logout </button></a>


<?php if ($stmt->rowCount() > 0) {
        echo "<h2>Lista de Documentos</h2>";
        echo "<ol>";
        // Itera sobre os resultados da consulta e exibe cada aluno em uma linha da tabela
        while ($linhaa = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $linhaa['id'];
            echo "<a href='documentos_visualizar_processo.php?id=$id' target='_blank'><button>Visualizar Documento</button></a><br>";
        }
        
        echo "</table>";
    } else {
        echo "<p>Nenhum documento para analise.</p>";
    }
?>

</body>
</html>