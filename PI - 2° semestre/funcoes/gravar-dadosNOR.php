<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $estado = $_POST["estado"];
    $nomeempresa = $_POST["nomeempresa"];
    $cnpj = $_POST["cnpj"];
    $departamento = $_POST["departamento"];
    $emailempresa = $_POST["emailempresa"];
    $enderecoempresa = $_POST["enderecoempresa"];
    $bairroempresa = $_POST["bairroempresa"];
    $cepempresa = $_POST["cepempresa"];
    $cidadeempresa = $_POST["cidadeempresa"];
    $estadoempresa = $_POST["estadoempresa"];
    $nomerepresentante = $_POST["nomerepresentante"];
    $representantecargo = $_POST["representantecargo"];
    $cpfrepresentante = $_POST["cpfrepresentante"];
    $telefonerepresentante = $_POST["telefonerepresentante"];
    $ra = $_POST["ra"];
    $semestre = $_POST["semestre"];
    $nomeestagiario = $_POST["nomeestagiario"];
    $rgestagiario = $_POST["rgestagiario"];
    $cidadeestagiario = $_POST["cidadeestagiario"];
    $telefoneempresa = $_POST["telefoneempresa"];
    $enderecoestagiario = $_POST["enderecoestagiario"];
    $objetivo = $_POST["objetivo"];
    $atividade = $_POST["atividade"];
    $periodo = $_POST["periodo"];
    $descricao = $_POST["descricao"];
    $estagiariocep = $_POST["estagiariocep"];
    $estagiariobairro = $_POST["estagiariobairro"];
    $estagiariotelefone = $_POST["estagiariotelefone"];
    $estagiarioemail = $_POST["estagiarioemail"];
    $horarioentrada = $_POST["horarioentrada"];
    $horariosaida = $_POST["horariosaida"];
    $entradarefeicao = $_POST["entradarefeicao"];
    $saidarefeicao = $_POST["saidarefeicao"];
    $horassemanais = $_POST["horassemanais"];
    $comeco = $_POST["comeco"];
    $fim = $_POST["fim"];
    $numeroapolice = $_POST["numeroapolice"];
    $nomeseguradora = $_POST["nomeseguradora"];
    $curso = "Desenvolvimento de Software Multiplataforma";
    include '../classes/Conexao.php';

    $condicao = "SELECT * FROM dadosformnor WHERE id_aluno = $id_aluno";
    $conexao->query($condicao);

    if (!$condicao){

    $sql = "INSERT INTO dadosformnor VALUES (   
        null, $id_aluno, '$horaocorrencia', '$nomedocumento', '$estado', '$nomeempresa', '$cnpj',
        '$departamento', '$emailempresa', '$enderecoempresa', '$bairroempresa', '$cepempresa',
        '$cidadeempresa','$estadoempresa','$nomerepresentante','$representantecargo','$cpfrepresentante',
        '$telefonerepresentante','$ra','$semestre','$nomeestagiario','$rgestagiario', '$cidadeestagiario',
        '$telefoneempresa','$enderecoestagiario','$objetivo','$atividade','$periodo','$descricao',
        '$estagiariocep','$estagiariobairro','$estagiariotelefone','$estagiarioemail', '$horarioentrada',
        '$horariosaida','$entradarefeicao','$saidarefeicao','$horassemanais','$comeco','$fim','$numeroapolice',
        '$nomeseguradora');";
         $conexao->exec($sql);}
         else{
            $sql = "DELETE FROM dadosformnor WHERE id_aluno = $id_aluno";
            $conexao->exec($sql);
            $sql = "INSERT INTO dadosformnor VALUES (   
                null, $id_aluno, '$horaocorrencia', '$nomedocumento', '$estado', '$nomeempresa', '$cnpj',
                '$departamento', '$emailempresa', '$enderecoempresa', '$bairroempresa', '$cepempresa',
                '$cidadeempresa','$estadoempresa','$nomerepresentante','$representantecargo','$cpfrepresentante',
                '$telefonerepresentante','$ra','$semestre','$nomeestagiario','$rgestagiario', '$cidadeestagiario',
                '$telefoneempresa','$enderecoestagiario','$objetivo','$atividade','$periodo','$descricao',
                '$estagiariocep','$estagiariobairro','$estagiariotelefone','$estagiarioemail', '$horarioentrada',
                '$horariosaida','$entradarefeicao','$saidarefeicao','$horassemanais','$comeco','$fim','$numeroapolice',
                '$nomeseguradora');";
                 $conexao->exec($sql);}
    header("Location:../views/form/formONR.php");
?>