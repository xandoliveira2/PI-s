<?php
    session_start();
    $iddocumento = $_POST['anteriordocs'];
    $id_aluno = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/form/formRP.css">
    <title>Relatório Parcial</title>
</head>
<body>
    <?php include "../../classes/Conexao.php";
        $sql = "SELECT * 
                FROM dadosformrp 
                WHERE idrequisicao = $iddocumento";

        $resultado = $conexao->query($sql);
        $lista = $resultado->fetch();
    ?>
    <form action="../../funcoes/gravar-dadosRP.php" method="post" id="formulario">
        <input type="hidden" name="nomedocumento" value="Relatório parcial">
        <input type="hidden" name="id_aluno" value="<?php echo $id_aluno?>" >

        <label for="nomeestagiario">Nome do estagiário:</label>
        <input type="text" name="nomeestagiario" id="nomeestagiario" value="<?php echo $lista['nomeestagiario'];?>">
        <label for="ra">R.A.:</label>
        <input type="text" name="ra" id="ra" value="<?php echo $lista['ra'];?>">
        <label for="nomeempresa">Nome da empresa:</label>
        <input type="text" name="nomeempresa" id="nomeempresa" value="<?php echo $lista['nomeempressa'];?>">
        <label for="nomerepresentante">Nome do responsável pelo estágio:</label>
        <input type="text" name="nomerepresentante" id="nomerepresentante" value="<?php echo $lista['nomerepresentante'];?>">
        <label for="datainicio">Data do inicio do estágio:</label>
        <input type="date" name="datainicio" id="datainicio" value="<?php echo $lista['datainicio'];?>">
        <label for="datatermino">Data do final do estágio:</label>
        <input type="date" name="datatermino" id="datatermino" value="<?php echo $lista['datatermino'];?>">
        <input type="submit" value="Gerar relatório" onclick="pegarValores()" >
    </form>
    <div class="seletor">
        <a href="../form/formRP.php"><p>Limpar preenchimento</p></a>
    </div>
    <script>
        function pegarValores(){
            let nomeestagiario = document.getElementById("nomeestagiario").value
            let ra = document.getElementById("ra").value
            let nomeempresa = document.getElementById("nomeempresa").value
            let nomerepresentante = document.getElementById("nomerepresentante").value
            let datainicio = document.getElementById("datainicio").value
            let datatermino = document.getElementById("datatermino").value
            let formatacao = String(datainicio).split("-")
            datainicio = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            formatacao = String(datatermino).split("-")
            datatermino = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            
            let html=`<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <style>
                            *{margin:0;padding:0;box-sizing: border-box;}
                            body{width: 100vw;height: 100vh;display: flex;justify-content: center;align-items:center;flex-direction: column;}
                            .dados{width: 80%;height: fit-content;border:2px solid black;padding:15px;word-wrap:break-word;}
                            table{width: 80%;}
                            p{margin:3px 0 3px 0;}
                            .observacoes{height: 14%;}
                            table,th,td{border:2px solid black;border-collapse: collapse;text-align: center;padding:5px;word-wrap: break-word;font-size:1.3em;}
                            html{font-size:10px;}
                            .dados h1{text-align: center;}
                            h1{font-size: 2.5em;}
                            h2{font-size: 2em;}
                            p{font-size:2em;}
                            
                        </style>
                    </head>
                    <body>
                    <div class="dados">
                        <h1>RELATÓRIO PARCIAL ESTÁGIO SUPERVISIONADO</h1>
                        <h2>1.Dados do(a) aluno(a):</h2>
                        <p>Nome: ${nomeestagiario}</p>
                        <p>R.A.: ${ra}</p>
                        <p>Curso: CST em Desenvolvimento de Software Multiplataforma</p>
                        <h2>2.Dados do local do estágio:</h2>
                        <p>Nome da empresa: ${nomeempresa}</p>
                        <p>Nome do responsável pelo estágio: ${nomerepresentante}</p>
                        <p>Data do início do estágio: ${datainicio}</p>
                        <p>Data do final do estágio: ${datatermino}</p>
                    </div>

                        <h2>3.Avaliação parcial do estágio:</h2>
                    <table>
                        <tr>
                            <th>Itens avaliados</th>
                            <th colspan="2">Parecer 1° Período</th>
                            <th colspan="2">Parecer 2° Período</th>
                            <th colspan="2">Parecer 3° Período</th>
                            <th colspan="2">Parecer 4° Período</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Sim</td>
                            <td>Não</td>
                            <td>Sim</td>
                            <td>Não</td>
                            <td>Sim</td>
                            <td>Não</td>
                            <td>Sim</td>
                            <td>Não</td>
                        </tr>
                        <tr>
                            <td>O aluno tem frequentado o estágio com assiduidade?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Mostra conhecimentos técnicos sobre a sua área de estudo?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tem comprometimento com as atividades planejadas para o estágio?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>   
                    <h2>4.Observações:</h2>
                    <div class="observacoes"></div>
                    <h2>5.Assinaturas:</h2>
                    <table style="border:0;">
                        <tr style="display:flex;border:0px;">
                            <td style="height: 100px;">Assinatura do(a) estagiário(a)</td>
                            <td style="height: 100px;">Assinatura do responsável pelo estágio</td>
                            <td style="height: 100px;">Coordenador(a) do curso</td>
                        </tr>
                    </table>


                    
                    </body>
            </html>`

            var novaJanela = window.open();
            novaJanela.document.write(html);
            novaJanela.print();
            document.getElementById("formulario").submit();
        }
    </script>  
</body>
</html>