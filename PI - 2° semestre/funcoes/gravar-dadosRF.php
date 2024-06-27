<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $nomeestagiario =$_POST['nomeestagiario'];
    $ra =$_POST['ra'];
    $nomeempresa =$_POST['nomeempresa'];
    $nomerepresentante =$_POST['nomerepresentante'];
    $datainicio =$_POST['datainicio'];
    $datatermino =$_POST['datatermino'];
    $diaatual =$_POST['diaatual'];
    $mesatual =$_POST['mesatual'];
    $anoatual =$_POST['anoatual'];


    include '../classes/Conexao.php';
    $condicao = "SELECT * FROM dadosformrf WHERE id_aluno = $id_aluno";
    $conexao->query($condicao);
    if (!$conexao){
    $sql = "INSERT INTO dadosformrf VALUES (
            null,$id_aluno,'$horaocorrencia','$nomedocumento',
            '$nomeestagiario','$ra','$nomeempresa','$nomerepresentante',
            '$datainicio','$datatermino', '$diaatual', '$mesatual','$anoatual'
            );";
    }
    else{ 
        $sql = "DELETE FROM dadosformrf WHERE id_aluno = $id_aluno";
        $conexao->exec($sql);
        
        $sql = "INSERT INTO dadosformrf VALUES (
        null,$id_aluno,'$horaocorrencia','$nomedocumento',
        '$nomeestagiario','$ra','$nomeempresa','$nomerepresentante',
        '$datainicio','$datatermino', '$diaatual', '$mesatual','$anoatual'
        );";} 
  
    
    $conexao->exec($sql);
    header("Location:../views/form/formRF.php");
?>