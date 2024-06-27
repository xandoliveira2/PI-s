<?php
    include "../../classes/Conexao.php";
    session_start();
    $id_aluno = $_SESSION['id'];

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
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/form/formTR.css">
    <title>Termo de rescisão</title>
</head>
<body>
    <header>
        <div class="logo opt">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
        <div class="perfil opt">
            <ul>
                <li><a href="#">Perfil de <?=$linha['nome']?></a></li>
                <li><a href="../usuarios/usuario-logout.php">Sair</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="sidebar-container">
            <div class="sidebar">
                <ul>
                    <a href="../alunos/aluno-gerar-documento.php" class="sidebar-opt"><li>Gerar Documento</li></a>
                    <a href="../alunos/aluno-novo-estagio.php" class="sidebar-opt"><li>Solicitar Estágio</li></a>
                    <a href="../alunos/aluno-acompanhar.php" class="sidebar-opt"><li>Acompanhar Processos</li></a>
                    <a href="../alunos/aluno-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
                </ul>
            </div>
        </div>
        <div class="container-content">
            <div class="content">
                <form action="../../funcoes/gravar-dadosTR.php" method="post" name="formulario" id="formulario">
                    <input type="hidden" name="id_aluno" value="<?php echo $id_aluno;?>">
                    <input type="hidden" name="nomedocumento" value="Termo de rescisão">
                
                    <label for="diaatual">Dia atual do documento:</label>
                    <input type="text" name="diaatual" id="diaatual" placeholder="ex: 20">
                
                    <label for="mesatual">Nome do mês atual do documento:</label>
                    <input type="text" name="mesatual" id="mesatual" placeholder="ex: Agosto">
                
                    <label for="anoatual">Ano atual do documento:</label>
                    <input type="text" name="anoatual" id="anoatual" placeholder="ex: 2012">
                
                    <label for="datarescisao">Data da rescisão:</label>
                    <input type="date" name="datarescisao" id="datarescisao">
                
                    <label for="datatermino">Data que começou o estágio:</label>
                    <input type="date" name="datatermino" id="datatermino">
                
                    <label for="nomeempresa">Nome da empresa:</label>
                    <input type="text" name="nomeempresa" id="nomeempresa">
                
                    <label for="nomeestagiario">Nome do estagiário:</label>
                    <input type="text" name="nomeestagiario" id="nomeestagiario">
                
                    <label for="nomecurso">Nome do curso:</label>
                    <input type="text" name="nomecurso" id="nomecurso">
                
                    <label for="motivo">Motivo:</label>
                    <select name="motivo" id="motivo">
                        <option value="" selected>Selecione uma opção</option>
                        <option value="CLT">Contratação de estagiário em regime CLT</option>
                        <option value="IEmp">Por iniciativa da empresa</option>
                        <option value="SI">Situação irregular de matrícula do estudante</option>
                        <option value="IEst">Por iniciativa do estudante</option>
                    </select>
                    <input type="submit" class="btns" value="Gerar relatório" onclick="pegarValoresFormulario()">
                </form>
    
                <div class="seletor">
                    <form action="../preencher/preenchertr.php" method="post">
                        <label for="anteriordocs">Preencher com base em:</label>
                        <select name="anteriordocs" id="anteriordocs">
                            <option value="" selected>Selecione uma opção</option> 
                            <?php include '../../classes/Conexao.php';
                            $sql = "SELECT idrequisicao, nomedocumento, horaocorrencia 
                                    FROM dadosformtr 
                                    WHERE id_aluno = $id_aluno";

                            $resultado = $conexao->query($sql);
                            $lista = $resultado->fetchAll();
                    
                            foreach ($lista as $linha) { ?>  
                                <option value="<?php echo $linha['idrequisicao'];?>"><?php echo $linha['nomedocumento']." ".$linha['horaocorrencia'];?></option> <?php 
                            } ?>
                        </select>
                        <input type="submit" class="btns" value="Puxar dados" id="btn-puxar-dados">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        function pegarValoresFormulario(){
           
            let diaatual = document.getElementById("diaatual").value;
            let mesatual = document.getElementById("mesatual").value;
            let anoatual = document.getElementById("anoatual").value;
            let datarescisao = document.getElementById("datarescisao").value;
            let datatermino = document.getElementById("datatermino").value;
            let nomeempresa = document.getElementById("nomeempresa").value;
            let nomecurso = document.getElementById("nomecurso").value;
            
            let nomeestagiario = document.getElementById("nomeestagiario").value;
            let motivo = document.getElementById("motivo").value;
       
      
            let formatacao = String(datarescisao).split("-")
            datarescisao = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            formatacao = String(datatermino).split("-")
            datatermino =formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            let html
           
            if (motivo == "CLT"){  html = `<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>*{margin:0;padding:0;box-sizing: border-box;}
                    html{font-size:10px;}
                    h1{margin:auto;
                    font-size: 2em;}
                    p{font-size:2em;margin:5px 0 5px 0;}
                        body{width: 100vw;height: 100vh;display: flex;justify-content: center;align-items: center;flex-direction: column;}
                        .documento {width: 80%;height:fit-content;border:2px solid black;display:flex;flex-direction: column;padding:15px;word-wrap: break-word;}
                        .assinatura{display: grid;width: 80vw ;height: 150px;grid-template-columns: 1fr 1fr 1fr;grid-template-areas: 'estagiario concedente diretor';}
                        .aluno{grid-area: estagiario;border:2px solid black;padding:10px;}
                        .concedente{grid-area: concedente;border:2px solid black;padding:10px;}
                        .diretor{grid-area:diretor;border:2px solid black;padding:10px;}
                    </style>
                </head>
                <body>
                    <div class="documento">
                        <h1>RESCISÃO DO TERMO DE COMPROMISSO DE ESTÁGIO</h1>
                        <p>Itapira, <strong> ${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                        <p>Comunicamos que a partir de <strong>${datarescisao}</strong> fica rescindido o Termo de Compromisso de Estágio firmado na data de <strong>${datatermino}</strong> entre a <strong>${nomeempresa}</strong> e o (a) estagiário (a) <strong>${nomeestagiario}</strong> regularmente matrículado no Curso de Gestão da Tecnologia em </strong>${nomecurso}</strong> com interveniência da Faculdade de Tecnologia "Ogari de Castro Pacheco".</p>
                        <p>Informamos que o referido estágio foi rescindido na supracitada data pelo seguinte motivo:</p>
                        <p>(X) Contratação do estagiário em regime CLT</p>
                        <p>( ) Por iniciativa da empresa</p>
                        <p>( ) Situação irregular de matrícula do estudante</p>
                        <p>( ) Por iniciativa do estudante</p>
                        <p>E por estarem de inteiro e comum acordo com as condições e dizeres desta Rescição as partes assinam-na em 03 vias de igual teor, cabendo a 1<sup>a</sup> Unidade Concedente, a 2<sup>a</sup> ao (à) estagiário e a 3<sup>a</sup> a Instituição de Ensino. </p>
                        <p style="margin-left:30%">Itapira, </strong>${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                    </div>
                    <div class="assinatura">
                <div class="aluno"><p>Nome e Assinatura Estagiário(a)</p></div>
                <div class="concedente"><p>UNIDADE CONCEDENTE (Carimbo e assinatura)</p></div>
                <div class="diretor">
                    <p><strong>CEETPS</strong></p>
                    <p>Prof. Me. Luiz Henrique Biazzoto</p>
                    <p>Diretor da Faculdade de Tecnologia "Ogari de Castro Pacheco"</p>
                </div>
                    </div>




                    <!-- <script>print()</script> -->
                </body>
                </html>`}
                            else if (motivo == "IEmp"){  html = `<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>*{margin:0;padding:0;box-sizing: border-box;}
                    html{font-size:10px;}
                    h1{margin:auto;
                    font-size: 2em;}
                    p{font-size:2em;margin:5px 0 5px 0;}
                        body{width: 100vw;height: 100vh;display: flex;justify-content: center;align-items: center;flex-direction: column;}
                        .documento {width: 80%;height:fit-content;border:2px solid black;display:flex;flex-direction: column;padding:15px;word-wrap: break-word;}
                        .assinatura{display: grid;width: 80vw ;height: 150px;grid-template-columns: 1fr 1fr 1fr;grid-template-areas: 'estagiario concedente diretor';}
                        .aluno{grid-area: estagiario;border:2px solid black;padding:10px;}
                        .concedente{grid-area: concedente;border:2px solid black;padding:10px;}
                        .diretor{grid-area:diretor;border:2px solid black;padding:10px;}
                    </style>
                </head>
                <body>
                    <div class="documento">
                        <h1>RESCISÃO DO TERMO DE COMPROMISSO DE ESTÁGIO</h1>
                        <p>Itapira, <strong> ${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                        <p>Comunicamos que a partir de <strong>${datarescisao}</strong> fica rescindido o Termo de Compromisso de Estágio firmado na data de <strong>${datatermino}</strong> entre a <strong>${nomeempresa}</strong> e o (a) estagiário (a) <strong>${nomeestagiario}</strong> regularmente matrículado no Curso de Gestão da Tecnologia em </strong>${nomecurso}</strong> com interveniência da Faculdade de Tecnologia "Ogari de Castro Pacheco".</p>
                        <p>Informamos que o referido estágio foi rescindido na supracitada data pelo seguinte motivo:</p>
                        <p>( ) Contratação do estagiário em regime CLT</p>
                        <p>(X) Por iniciativa da empresa</p>
                        <p>( ) Situação irregular de matrícula do estudante</p>
                        <p>( ) Por iniciativa do estudante</p>
                        <p>E por estarem de inteiro e comum acordo com as condições e dizeres desta Rescição as partes assinam-na em 03 vias de igual teor, cabendo a 1<sup>a</sup> Unidade Concedente, a 2<sup>a</sup> ao (à) estagiário e a 3<sup>a</sup> a Instituição de Ensino. </p>
                        <p style="margin-left:30%">Itapira, </strong>${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                    </div>
                    <div class="assinatura">
                <div class="aluno"><p>Nome e Assinatura Estagiário(a)</p></div>
                <div class="concedente"><p>UNIDADE CONCEDENTE (Carimbo e assinatura)</p></div>
                <div class="diretor">
                    <p><strong>CEETPS</strong></p>
                    <p>Prof. Me. Luiz Henrique Biazzoto</p>
                    <p>Diretor da Faculdade de Tecnologia "Ogari de Castro Pacheco"</p>
                </div>
                    </div>




                    <!-- <script>print()</script> -->
                </body>
                </html>`}
                            else if (motivo == "SI"){  html = `<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>*{margin:0;padding:0;box-sizing: border-box;}
                    html{font-size:10px;}
                    h1{margin:auto;
                    font-size: 2em;}
                    p{font-size:2em;margin:5px 0 5px 0;}
                        body{width: 100vw;height: 100vh;display: flex;justify-content: center;align-items: center;flex-direction: column;}
                        .documento {width: 80%;height:fit-content;border:2px solid black;display:flex;flex-direction: column;padding:15px;word-wrap: break-word;}
                        .assinatura{display: grid;width: 80vw ;height: 150px;grid-template-columns: 1fr 1fr 1fr;grid-template-areas: 'estagiario concedente diretor';}
                        .aluno{grid-area: estagiario;border:2px solid black;padding:10px;}
                        .concedente{grid-area: concedente;border:2px solid black;padding:10px;}
                        .diretor{grid-area:diretor;border:2px solid black;padding:10px;}
                    </style>
                </head>
                <body>
                    <div class="documento">
                        <h1>RESCISÃO DO TERMO DE COMPROMISSO DE ESTÁGIO</h1>
                        <p>Itapira, <strong> ${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                        <p>Comunicamos que a partir de <strong>${datarescisao}</strong> fica rescindido o Termo de Compromisso de Estágio firmado na data de <strong>${datatermino}</strong> entre a <strong>${nomeempresa}</strong> e o (a) estagiário (a) <strong>${nomeestagiario}</strong> regularmente matrículado no Curso de Gestão da Tecnologia em </strong>${nomecurso}</strong> com interveniência da Faculdade de Tecnologia "Ogari de Castro Pacheco".</p>
                        <p>Informamos que o referido estágio foi rescindido na supracitada data pelo seguinte motivo:</p>
                        <p>( ) Contratação do estagiário em regime CLT</p>
                        <p>( ) Por iniciativa da empresa</p>
                        <p>(X) Situação irregular de matrícula do estudante</p>
                        <p>( ) Por iniciativa do estudante</p>
                        <p>E por estarem de inteiro e comum acordo com as condições e dizeres desta Rescição as partes assinam-na em 03 vias de igual teor, cabendo a 1<sup>a</sup> Unidade Concedente, a 2<sup>a</sup> ao (à) estagiário e a 3<sup>a</sup> a Instituição de Ensino. </p>
                        <p style="margin-left:30%">Itapira, </strong>${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                    </div>
                    <div class="assinatura">
                <div class="aluno"><p>Nome e Assinatura Estagiário(a)</p></div>
                <div class="concedente"><p>UNIDADE CONCEDENTE (Carimbo e assinatura)</p></div>
                <div class="diretor">
                    <p><strong>CEETPS</strong></p>
                    <p>Prof. Me. Luiz Henrique Biazzoto</p>
                    <p>Diretor da Faculdade de Tecnologia "Ogari de Castro Pacheco"</p>
                </div>
                    </div>




                    <!-- <script>print()</script> -->
                </body>
                </html>`}
                            else { html = `<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>*{margin:0;padding:0;box-sizing: border-box;}
                    html{font-size:10px;}
                    h1{margin:auto;
                    font-size: 2em;}
                    p{font-size:2em;margin:5px 0 5px 0;}
                        body{width: 100vw;height: 100vh;display: flex;justify-content: center;align-items: center;flex-direction: column;}
                        .documento {width: 80%;height:fit-content;border:2px solid black;display:flex;flex-direction: column;padding:15px;word-wrap: break-word;}
                        .assinatura{display: grid;width: 80vw ;height: 150px;grid-template-columns: 1fr 1fr 1fr;grid-template-areas: 'estagiario concedente diretor';}
                        .aluno{grid-area: estagiario;border:2px solid black;padding:10px;}
                        .concedente{grid-area: concedente;border:2px solid black;padding:10px;}
                        .diretor{grid-area:diretor;border:2px solid black;padding:10px;}
                    </style>
                </head>
                <body>
                    <div class="documento">
                        <h1>RESCISÃO DO TERMO DE COMPROMISSO DE ESTÁGIO</h1>
                        <p>Itapira, <strong> ${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                        <p>Comunicamos que a partir de <strong>${datarescisao}</strong> fica rescindido o Termo de Compromisso de Estágio firmado na data de <strong>${datatermino}</strong> entre a <strong>${nomeempresa}</strong> e o (a) estagiário (a) <strong>${nomeestagiario}</strong> regularmente matrículado no Curso de Gestão da Tecnologia em </strong>${nomecurso}</strong> com interveniência da Faculdade de Tecnologia "Ogari de Castro Pacheco".</p>
                        <p>Informamos que o referido estágio foi rescindido na supracitada data pelo seguinte motivo:</p>
                        <p>( ) Contratação do estagiário em regime CLT</p>
                        <p>( ) Por iniciativa da empresa</p>
                        <p>( ) Situação irregular de matrícula do estudante</p>
                        <p>(X) Por iniciativa do estudante</p>
                        <p>E por estarem de inteiro e comum acordo com as condições e dizeres desta Rescição as partes assinam-na em 03 vias de igual teor, cabendo a 1<sup>a</sup> Unidade Concedente, a 2<sup>a</sup> ao (à) estagiário e a 3<sup>a</sup> a Instituição de Ensino. </p>
                        <p style="margin-left:30%">Itapira, </strong>${diaatual} de ${mesatual} de ${anoatual}</strong></p>
                    </div>
                    <div class="assinatura">
                <div class="aluno"><p>Nome e Assinatura Estagiário(a)</p></div>
                <div class="concedente"><p>UNIDADE CONCEDENTE (Carimbo e assinatura)</p></div>
                <div class="diretor">
                    <p><strong>CEETPS</strong></p>
                    <p>Prof. Me. Luiz Henrique Biazzoto</p>
                    <p>Diretor da Faculdade de Tecnologia "Ogari de Castro Pacheco"</p>
                </div>
                    </div>




                    <!-- <script>print()</script> -->
                </body>
        </html>`}
            
            var novaJanela = window.open();
            novaJanela.document.write(html);
            novaJanela.print();
            document.getElementById("formulario").submit();
        }
    </script>
</body>
</html>