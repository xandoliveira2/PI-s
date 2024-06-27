<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $nomeestagiario  = $_POST['nomeestagiario'];
    $ra = $_POST['ra'];
    $nomerepresentante  = $_POST['nomerepresentante'];
    $nomeempresa  = $_POST['nomeempresa'];
    $datainicio  = $_POST['datainicio'];
    $datatermino  = $_POST['datatermino'];
    include '../classes/Conexao.php';
    $condicao = "SELECT * FROM dadosformrp WHERE id_aluno = $id_aluno";
    $conexao->query($condicao);
    if (!$conexao){
    $sql = "INSERT INTO dadosformrp VALUES (
            null,$id_aluno,'$horaocorrencia', '$nomedocumento', 
            '$nomeestagiario','$ra','$nomerepresentante',
            '$nomeempresa','$datainicio','$datatermino'
            );";}
    else{
        $sql = "DELETE FROM dadosformrp WHERE id_aluno = $id_aluno";
        $conexao->exec($sql);
            $sql = "INSERT INTO dadosformrp VALUES (
                    null,$id_aluno,'$horaocorrencia', '$nomedocumento', 
                    '$nomeestagiario','$ra','$nomerepresentante',
                    '$nomeempresa','$datainicio','$datatermino'
                    );";
    }


$conexao->exec($sql);
header("Location:../views/form/formRP.php");

?>  