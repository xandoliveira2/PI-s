<?php
$id_documento = $_POST['id_documento'];
$avaliacao = $_POST['avaliar'];
$pag = $_POST['pag'];

include "../classes/Conexao.php";

if ($avaliacao == 'aprovar'){
    $sql = "UPDATE tb_documentos SET status = 'aprovado' 
            WHERE id = $id_documento";

} else { 
    $sql = "UPDATE tb_documentos SET status = 'reprovado' 
            WHERE id = $id_documento";

    $motivo = $_POST['motivo'];
    
    $sql1 = "UPDATE tb_documentos set comentario = '$motivo' 
            WHERE id = $id_documento";

    $conexao->exec($sql1);
}

$conexao->exec($sql);

if ($pag == '1') { header("Location:../views/professores/professor-pendente-assinado.php "); }
else { header("Location: ../views/professores/professor-pendente.php"); }
?>