<?php
    $id = $_POST['id_documento'];
    $sql = "SELECT documento 
            FROM tb_documentos 
            WHERE id = $id";

    include "../classes/Conexao.php";

    $resultado = $conexao->query($sql);
    $documento = $resultado->fetch();
    $documento1 = $documento['documento'];
    
    header('Content-type: application/pdf');
    echo $documento1;
?>