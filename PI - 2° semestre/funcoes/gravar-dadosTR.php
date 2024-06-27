<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $diaatual = $_POST['diaatual'];
    $mesatual = $_POST['mesatual'];
    $anoatual = $_POST['anoatual'];
    $datarescisao = $_POST['datarescisao'];
    $datatermino = $_POST['datatermino'];
    $nomeempresa = $_POST['nomeempresa'];
    $nomeestagiario = $_POST['nomeestagiario'];
    $nomecurso = $_POST['nomecurso'];
    $motivo = $_POST['motivo'];
    include "../classes/Conexao.php";

    $condicao = "SELECT * FROM dadosformtr WHERE id_aluno = $id_aluno";
    $conexao->query($condicao);
    if (!$conexao){
        $sql = "INSERT INTO dadosformtr VALUES (
            null, $id_aluno, '$horaocorrencia', '$nomedocumento', '$diaatual',
            '$mesatual', '$anoatual', '$datarescisao', '$datatermino','$nomeempresa',
            '$nomeestagiario', '$nomecurso', '$motivo'
            );";
    }
    else{
        $sql = "DELETE FROM dadosformtr WHERE id_aluno = $id_aluno";
        $conexao->exec($sql);
    $sql = "INSERT INTO dadosformtr VALUES (
            null, $id_aluno, '$horaocorrencia', '$nomedocumento', '$diaatual',
            '$mesatual', '$anoatual', '$datarescisao', '$datatermino','$nomeempresa',
            '$nomeestagiario', '$nomecurso', '$motivo'
            );";
    }
    
    $conexao->exec($sql);
    header("Location:../views/form/formTR.php");
?>