<?php
    include "../../classes/Conexao.php";
    session_start();
    $idaluno = $_SESSION['id'];

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
    <link rel="stylesheet" href="../../estilo/form/formOR.css">
    <title>Document</title>
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
            <form action="../../funcoes/gravar-dadosOR.php" method="post" id="formulario">
                <input type="hidden" name="codigophp">
                <input type="hidden" name="nomedocumento" value="Estágio obrigatório remunerado">
                <input type="hidden" name="id_aluno" value="<?php echo $idaluno?>">
                <!-- nomeempresa, cnpj, endereco da empresa, nome representante + cargo, cpf do representante, nome do estagiario , rg do estagiario
                endereco do estagiario , cidade do estagiario -->
                <div class="empresa">
                <label for="nomeempresa">Nome da empresa:</label>
                <input required type="text" name="nomeempresa" id="nomeempresa">
                <label for="cnpj">Cnpj:</label>
                <input required type="text" name="cnpj" id="cnpj">
                <label for="departamento">Divisão ou Departamento:</label>
                <input required type="text" name="departamento" id="departamento">
                <label for="emailempresa">Email da empresa:</label>
                <input required type="email" name="emailempresa" id="emailempresa">
            
                <label for="enderecoempresa">Endereço empresa:</label>
                <input required type="text" name="enderecoempresa" id="enderecoempresa" placeholder="Rua / n°">
                <label for="bairroempresa">Bairro:</label>
                <input required type="text" name="bairroempresa" id="bairroempresa">
                <label for="telefoneempresa">Telefone da empresa:</label>
                <input required type="text" name="telefoneempresa" id="telefoneempresa">
                <label for="cepempresa">CEP da empresa:</label>
                <input required type="text" name="cepempresa" id="cepempresa">
                <label for="cidadeempresa">Cidade da empresa:</label>
                <input required type="text" name="cidadeempresa" id="cidadeempresa">
                <label for="estadoempresa">Estado da empresa:</label>
                <select id="estadoempresa" name="estadoempresa">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP" selected>São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            
                <label for="nomerepresentante">Nome representante:</label>
                <input required type="text" name="nomerepresentante" id="nomerepresentante">
                <label for="representantecargo">Cargo do representante:</label>
                <input required type="text" name="representantecargo" id="representantecargo">
                <label for="cpfrepresentante">CPF do representante:</label>
                <input required type="text" name="cpfrepresentante" id="cpfrepresentante">
                <label for="telefonerepresentante">Telefone do representante:</label>
                <input required type="tel" name="telefonerepresentante" id="telefonerepresentante">
                </div>
                <div class="aluno">
                    <label for="ra">R.A:</label>
                    <input required type="text" name="ra" id="ra">
            
                    <label for="semestre">Semestre:</label>
                    <input required type="number" name="semestre" id="semestre">
                <label for="nomeestagiario">Nome do estagiário:</label>
                <input required type="text" name="nomeestagiario" id="nomeestagiario">
            
                <label for="rgestagiario">RG do estagiário:</label>
                <input required type="text" name="rgestagiario" id="rgestagiario">
            
                <label for="enderecoestagiario">Endereço do estagiário:</label>
                <input required type="text" name="enderecoestagiario" id="enderecoestagiario" placeholder="Rua / n°">
            
                <label for="cidadeestagiario">Cidade do estagiário:</label>
                <input required type="text" name="cidadeestagiario" id="cidadeestagiario">
                <label for="bairro">Bairro:</label>
                <input required type="text" name="estagiariobairro" id="estagiariobairro">
                <label for="estagiariocep">CEP</label>
                <input required type="text" name="estagiariocep" id="estagiariocep">
                <label for="estagiariotelefone">Telefone:</label>
                <input required type="tel" name="estagiariotelefone" id="estagiariotelefone">
                <label for="estagiarioemail">Email do estagiário:</label>
                <input required type="email" name="estagiarioemail" id="estagiarioemail">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP" selected>São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div><div class="estagio">
                <label for="horarioentrada">Horário entrada:</label>
                <input required type="time" name="horarioentrada" id="horarioentrada">
            
                <label for="horariosaida">Horário saida:</label>
                <input required type="time" name="horariosaida" id="horariosaida">
                <label for="entradarefeicao">Entrada do horário de refeição:</label>
                <input required type="time" name="entradarefeicao" id="entradarefeicao" >
                <label for="saidarefeicao">Saida do horário de refeição:</label>
                <input required type="time" name="saidarefeicao" id="saidarefeicao">
                <label for="horassemanais">Horas totais semanais:</label>
                <input required type="number" name="horassemanais" id="horassemanais">
                <label for="comeco">Data do começo do estágio:</label>
                <input required type="date" name="comeco" id="comeco" >
            
                <label for="fim">Data do fim do estágio:</label>
                <input required type="date" name="fim" id="fim">
                <label for="salario">Salário:</label>
                <input required type="text" name="salario" id="salario">
                <label for="salarioextenso">Digite o salário por extenso</label>
                <input required type="text" name="salarioextenso" id="salarioextenso" placeholder="ex: quinhentos e um reais e trinta centavos">
            </div>
                <div class="seguro">
                <label for="numeroapolice">Número da apólice:</label>
                <input required type="text" name="numeroapolice" id="numeroapolice">
                <label for="nomeseguradora">Nome da seguradora:</label>
                <input required type="text" name="nomeseguradora" id="nomeseguradora">
                </div>
                <div class="atividades">
                <label for="atividade">Atividade:</label>
                <textarea name="atividade" id="atividade" maxlength="700"></textarea>
                <label for="descricao">Descrição da atividade:</label>
                <textarea name="descricao" id="descricao" maxlength="700" ></textarea>
                <label for="objetivo">Objetivo ou resultado esperado:</label>
                <textarea name="objetivo" id="objetivo" maxlength="700"></textarea>
                <label for="periodo">Período previsto (inicio e término):</label>
                <textarea name="periodo" id="periodo" maxlength="700"></textarea></div>
                <input type="submit" value="Enviar" onclick="pegarValoresFormulario()" name="gravarnobd" class="primeiro">
            
            </form>
                <div class="seletor">
                    <form action="../preencher/preencher.php" method="post">
                        <label for="anteriordocs">Preencher com base em:</label>
                        <select name="anteriordocs" id="anteriordocs">
                        <option value="" selected>Selecione uma opção</option>
                        <?php
                        include '../../classes/Conexao.php';
                        $sql = "SELECT idrequisicao, nomedocumento, horario 
                                FROM dadosformor 
                                WHERE id_aluno = $idaluno";
                                
                        $resultado = $conexao->query($sql);
                        $lista = $resultado->fetchAll();
                        foreach ($lista as $linha){
                        ?>
                        <option value="<?php echo $linha['idrequisicao'];?>"><?php echo $linha['nomedocumento']." ".$linha['horario'];?></option>
                        <?php }?>
                        </select>
                        <input type="submit" value="Puxar dados" id="btn-puxar-dados">
                    </form>
                </div>
        </div>
    </div>
    </main>
    <script>


        function pegarValoresFormulario(){

            
            let estado = document.getElementById("estado").value;
            let nomeempresa = document.getElementById("nomeempresa").value;
            let cnpj = document.getElementById("cnpj").value;
            let departamento = document.getElementById("departamento").value;
            let emailempresa = document.getElementById("emailempresa").value;
            let enderecoempresa = document.getElementById("enderecoempresa").value;
            let bairroempresa = document.getElementById("bairroempresa").value;
            let cepempresa = document.getElementById("cepempresa").value;
            let cidadeempresa = document.getElementById("cidadeempresa").value;
            let estadoempresa = document.getElementById("estadoempresa").value;
            let nomerepresentante = document.getElementById("nomerepresentante").value;
            let representantecargo = document.getElementById("representantecargo").value;
            let cpfrepresentante = document.getElementById("cpfrepresentante").value;
            let telefonerepresentante = document.getElementById("telefonerepresentante").value;
            let ra = document.getElementById("ra").value;
            let semestre = document.getElementById("semestre").value;
            let nomeestagiario = document.getElementById("nomeestagiario").value;
            let rgestagiario = document.getElementById("rgestagiario").value;
            let cidadeestagiario = document.getElementById("cidadeestagiario").value;
            let telefoneempresa = document.getElementById("telefoneempresa").value;
            let enderecoestagiario = document.getElementById("enderecoestagiario").value;
            let objetivo = document.getElementById("objetivo").value;
            let atividade = document.getElementById("atividade").value;
            let periodo = document.getElementById("periodo").value;
            let descricao = document.getElementById("descricao").value;
            let estagiariocep = document.getElementById("estagiariocep").value;
            let estagiariobairro = document.getElementById("estagiariobairro").value;
            let estagiariotelefone = document.getElementById("estagiariotelefone").value;
            let estagiarioemail = document.getElementById("estagiarioemail").value;
            let horarioentrada = document.getElementById("horarioentrada").value;
            let horariosaida = document.getElementById("horariosaida").value;
            let entradarefeicao = document.getElementById("entradarefeicao").value;
            let saidarefeicao = document.getElementById("saidarefeicao").value;
            let horassemanais = document.getElementById("horassemanais").value;
            let comeco = document.getElementById("comeco").value;
            let fim = document.getElementById("fim").value;
            let salario = document.getElementById("salario").value;
            let salarioextenso = document.getElementById("salarioextenso").value;
            let numeroapolice = document.getElementById("numeroapolice").value;
            let nomeseguradora = document.getElementById("nomeseguradora").value;
            let formatacao = String(comeco).split("-")
            comeco = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            formatacao = String(fim).split("-")
            fim = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            let curso = "Desenvolvimento de Software Multiplataforma";
          
            let html = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
        *{padding:0;
        margin:0;
    box-sizing: border-box;}
   
    .linhacabecalho{display: flex;flex-direction: column;
    text-align: center;}
    .linhacabecalho h1{font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 10pt;
color: rgb(178, 0, 0);}

    .nd{display: flex;justify-content: space-around;}
    img{height: 75px;}
        h1{font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 11pt;
text-align: center;}
        p{font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 11pt;
margin:19px;
    }

.rodape h2{font-family: Verdana, Geneva, Tahoma, sans-serif;
font-size: 8.5pt;
color: rgb(178, 0, 0);}
.rodape h3{font-family: Verdana, Geneva, Tahoma, sans-serif;
font-size: 8pt;
color: black;}
.gridaluno{
    width: 100vw;
    height: fit-content;
    display: grid;
    grid-template-columns: 30% 20% 49%;
    grid-template-rows: 40px 40px 40px 40px 40px 40px;
    grid-template-areas: 'matricula nome nome' 'curso curso semestre' 'endereco endereco endereco' 'bairro bairro bairro' 'cep cep cep' 'email email email';
    
}
.bairro{grid-area: bairro;
border: 2px solid black;

display:flex;
align-items: center;}
.cep{grid-area:cep;
border: 2px solid black;
display:flex;
align-items: center;}


.email{grid-area:email;
border: 2px solid black;
display:flex;
align-items: center;}
.semestre{grid-area: semestre;
border: 2px solid black;
display:flex;
align-items: center;}
.endereco{grid-area: endereco;
border: 2px solid black;
display:flex;
align-items: center;}
.nome{
border: 2px solid black;
display:flex;
align-items: center;
grid-area: nome;}
.matricula{grid-area:matricula;
    border: 2px solid black;
    display:flex;
    align-items: center;
}
.curso{grid-area:curso;
border: 2px solid black;
display:flex;
align-items: center;}

.gridempresa{

    width: 100%;
    height: fit-content;
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 40px 40px 40px 40px 40px 40px 40px 40px ;
    grid-template-areas: 'nome nome nome' 'divisao divisao divisao' 'endereco endereco endereco' 'bairro bairro bairro' 'cep cep cep' 'email email email' 'nomesup nomesup nomesup' 'cargosup cargosup cargosup';
}
.cargosup{
    grid-area: cargosup;
    border: 2px solid black;
    
    
}
.nomesup{grid-area: nomesup;
border: 2px solid black;
display: flex;
align-items: center;}
.nome1{grid-area: nome;
border:2px solid black;
display: flex;
align-items: center;}
.divisao{grid-area: divisao;
display: flex;
align-items: center;
border: 2px solid black;}
.idenestagio{display: grid;
grid-template-columns: 45% 55%;
grid-template-rows: 60px 60px 50px;
grid-template-areas: 'classificacao previsto' 'valormensal real' 'horario horario';
width: 100%;
height: fit-content;}

.horario{grid-area: horario;
border:2px solid black;
display:flex;
align-items: center;}
.real{grid-area: real;
border:2px solid black;
display:flex;
align-items: center;}
.valormensal{grid-area: valormensal;
border:2px solid black;
display:flex;
align-items: center;}
.previsto{grid-area: previsto;
border:2px solid black;
display:flex;
align-items: center;}
.classificacao{grid-area: classificacao;
border:2px solid black;
display:flex;
align-items: center;}

.gridatividades{width: 100%;
    height: fit-content;
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    grid-template-rows: 1fr;
    grid-template-areas: 'a1 a2 a3 a4';
    margin-bottom: 10px;
}
.a1{border:2px solid black;
grid-area: a1;
overflow-wrap: break-word;}
.a2{border:2px solid black;
grid-area: a2;
overflow-wrap: break-word;}
.a3{border:2px solid black;
grid-area: a3;
overflow-wrap: break-word;}
.a4{border:2px solid black;
grid-area: a4;
overflow-wrap: break-word;}

.gridfinal{display: grid;
    margin-bottom: 10px;
    width: 100%;
    height: fit-content;
grid-template-columns: 40% 60%;
grid-template-rows: 100px 200px;
grid-template-areas:'empresa estagiario' 'empresa cordenador' ;}
.empresa{grid-area: empresa;
border: 2px solid black;}
.estagiario{grid-area: estagiario;
border: 2px solid black;}

.cordenador{grid-area: cordenador;
    overflow-wrap: break-word;
border: 2px solid black;}







.rodape{display: flex;text-align: center;flex-direction: column;position: absolute;top: calc(1064px - 29.4px); left:67px;}
.folha{width: 730px;
height: 1064px;
border:1px solid rgba(0, 0, 0, 0.05);
padding:3px;
overflow-wrap: break-word;
overflow: hidden;
}
.imageminicial{display: flex;justify-content: space-around;}
</style>
</head>
<body>
    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>

    <h1>TERMO DE COMPROMISSO PARA A REALIZAÇÃO DE ESTÁGIO SUPERVISIONADO OBRIGATÓRIO NÃO REMUNERADO (Lei nº 11.778/08)</h1>
    <p>Pelo presente instrumento, as partes a seguir nomeadas e ao final assinadas, de um lado ${nomeempresa}, inscrita no CNPJ sob o nº ${cnpj}, sita à rua ${enderecoempresa}, doravante denominada CONCEDENTE, neste ato representada por ,${nomerepresentante}(${representantecargo}), portador do CPF nº ${cpfrepresentante} e, de outro lado, o(a) estudante ${nomeestagiario}, RG nº ${rgestagiario}, residente à ${enderecoestagiario}, na cidade de ${cidadeestagiario}, doravante denominado ESTAGIÁRIO (A), aluno (a) regularmente matriculado (a) no Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma da Faculdade de Tecnologia de Itapira – Fatec “Ogari de Castro Pacheco”, inscrita no CNPJ sob o nº 62.823.257/0278-05, localizada na cidade de Itapira, Estado de São Paulo, doravante denominada INSTITUIÇÃO DE ENSINO, na condição de interveniente, acordam e estabelecem entre si as cláusulas e condições que regerão este <strong>TERMO DE COMPROMISSO DE ESTÁGIO OBRIGATÓRIO REMUNERADO</strong>.</p>
    <p><strong>CLÁUSULA PRIMEIRA</strong>. É objeto do presente Termo de Compromisso de Estágio autorizar a realização de estágio nos termos da Lei 11.788/08 de 25/09/2008, com a finalidade de possibilitar ao (à) Estagiário (a) complementação e aperfeiçoamento prático de seu Curso Superior de Tecnologia, celebrado entre a Concedente e a Instituição de Ensino da qual o (a) Estagiário (a) é aluno (a).</p>
    <p>Parágrafo Primeiro. Entende-se por estágio profissional aquele desenvolvido em ambiente real de trabalho, assumido como ato educativo e supervisionado pela instituição de ensino, em regime de parceria com organizações do mundo do trabalho, objetivando efetiva preparação do estudante para o trabalho, conforme o art. 34, § 1º da Resolução CNE/CP Nº 1/2021. </p>
    <p>Parágrafo Segundo. As atividades de estágio somente poderão ser iniciadas após assinatura do Termo de Compromisso de Estágio pelas partes envolvidas, não sendo reconhecida ou validada com data retroativa.</p>
    <p>Parágrafo Terceiro. Em caso de prorrogação de vigência do Termo de Compromisso de Estágio, o preenchimento e a assinatura do Termo Aditivo deverão ser providenciados, com antecedência de 20 (vinte) dias, antes da data de encerramento, contida neste Termo de Compromisso.</p>
    <p><strong>CLÁUSULA SEGUNDA</strong>. As atividades a serem desenvolvidas durante o Estágio, objeto do presente Termo de Compromisso, constarão de Plano de Estágio construído pelo (a) Estagiário (a) em conjunto com a Concedente e orientado por professor da Instituição de Ensino.</p>
    <p>Parágrafo primeiro: O Plano de Atividade de Estágio – PAE está anexo ao Termo de Compromisso de Estágio.</p>
    <p><strong>CLÁUSULA TERCEIRA</strong>. Fica compromissado entre as partes que:</p>
    <p>I - As atividades do Estágio a serem cumpridas pelo (a) Estagiário (a) serão no horário das ${horarioentrada} às ${horariosaida} horas, com intervalo das refeições das ${entradarefeicao} às ${saidarefeicao} horas, de 2ª a 6ª feira, perfazendo ${horassemanais} horas semanais;</p> 
    <p>II - A jornada de atividade do(a) Estagiário(a) deverá compatibilizar-se com o horário escolar do(a) Estagiário(a) e com o horário da Concedente;</p> 


        <div class="rodape" style="opacity: 60%;">
            <h2>www.fatecitapira.edu.br</h2>
            <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
        </div>

    </div>
    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>
    <p>III- Este Termo de Compromisso terá vigência de ${comeco} a ${fim}, podendo ser denunciado a qualquer tempo, por qualquer das três partes envolvidas, unilateralmente, mediante comunicação escrita, com antecedência mínima de 5 (cinco) dias;</p> 
<p>IV - O (A) Estagiário (a) receberá da concedente durante o período de estágio, uma bolsa no valor de R$ ${salario} (${salarioextenso}) e auxílio transporte, conforme acordado entre as partes;  </p>  
<p>V - Nos períodos em que a instituição de ensino adotar verificações de aprendizagem periódica ou final, a carga horária do estágio será reduzida pelo menos à metade para garantir o bom desempenho do estudante, conforme o art. 10, § 2º da Lei de Estágio;</p>
<p>VI - A duração do estágio, na mesma parte concedente, não poderá exceder 2 (dois) anos, exceto quando se tratar de estagiário com deficiência, conforme art. 11 da Lei de Estágio;</p>
<p>VII - O estágio não pode, em qualquer hipótese, se estender após a conclusão do Curso Superior de Tecnologia.</p>
<p><strong>CLÁUSULA QUARTA</strong>. Além das atribuições e responsabilidade previstas no presente Termo de Compromisso de Estágio, caberá à CONCEDENTE:</p> 
<p>I – Garantir ao (à) Estagiário (a) o cumprimento das exigências escolares, inclusive no que se refere ao horário escolar;</p>
<p>II - Proporcionar ao (à) Estagiário (a) atividades de aprendizagem social, profissional e cultural compatíveis com sua formação profissional;</p> 
<p>III - Proporcionar ao (à) Estagiário (a) condições de treinamento prático e de relacionamento humano;</p> 
<p>IV - Designar um (a) Supervisor (a) ou responsável para orientar as tarefas do Estagiário;</p> 
<p>V - Proporcionar à Instituição de Ensino, sempre que necessário, subsídios que possibilitem o acompanhamento, a supervisão e a avaliação parcial do Estagiário;</p> 
<p>VI – Entregar ao (à) Estagiário (a), por ocasião do desligamento, termo de realização do estágio, indicando de forma resumida as atividades desenvolvidas, os períodos e a avaliação de desempenho.</p>
<p>VII - Estabelecer o valor a ser pago como Bolsa-Estágio.</p>
<p><strong>CLÁUSULA QUINTA</strong>. Além das atribuições e responsabilidade previstas no presente Termo de Compromisso de Estágio, caberá ao (à) ESTAGIÁRIO (A):</p> 
<p>I - Estar regularmente matriculada na Instituição de Ensino, em semestre compatível com a prática exigida no Estágio;</p> 
<p>II - Observar as diretrizes e/ou normas internas da Concedente e os dispositivos legais aplicáveis ao estágio, bem como as orientações do Professor Responsável de Estágios e do seu Supervisor ou responsável; </p>






    <div class="rodape" style="opacity: 60%;top: calc(1064px * 2 - 29.4px)">
        <h2>www.fatecitapira.edu.br</h2>
        <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
    </div>


    </div>

    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>


    <p>III - Cumprir, com seriedade e responsabilidade, empenho e interesse a programação estabelecida entre a Concedente, o (a) Estagiário (a) e a Instituição de Ensino e preservar o sigilo das informações a que tiver acesso; </p>
    <p>IV - Elaborar e entregar à Instituição de Ensino de relatórios parciais e relatório final sobre seu estágio, na forma estabelecida por ele; </p>
    <p>V - Cumprir as normas internas da Concedente, principalmente as relacionadas com o estágio e não divulgar ou transmitir, durante ou depois do período de estágio, a quem quer que seja, qualquer informação confidencial ou material que se relacione com os negócios da Concedente;</p>
    <p>VI - Responder pelas perdas e danos consequentes da inobservância das cláusulas constantes do presente termo; </p>
    <p>VII - Comunicar à Concedente, no prazo de 5 (cinco) dias, a ocorrência de qualquer uma das alternativas do inciso I da Cláusula Oitava; </p>
    <p>VIII - Respeitar as cláusulas do Termo de Compromisso; </p>
    <p>IX - Encaminhar obrigatoriamente à Instituição de Ensino e à Concedente uma via do presente instrumento, devidamente assinado pelas partes.  </p>
    <p>X – Comunicar à Instituição de Ensino qualquer fato relevante sobre o estágio.</p>
    <p><strong>CLÁUSULA SEXTA</strong>. Caberá à INSTITUIÇÃO DE ENSINO: </p>
    <p>I - Estabelecer critérios para a realização do Estágio Supervisionado, seu acompanhamento e avaliação bem como encaminhá-los à Concedente; </p>
    <p>II - Planejar o estágio, orientar, supervisionar e avaliar o (a) Estagiário (a), parcialmente e ao final do estágio.</p>
    <p><strong>CLÁUSULA SÉTIMA</strong>. A Concedente se obriga a fazer o Seguro de Acidentes Pessoais ocorridos nos locais de estágio, conforme legislação vigente, de acordo com a Apólice de Seguro nº ${numeroapolice}, da Seguradora ${nomeseguradora}, nos termos do Artigo 9º Inciso IV da Lei 11.788/08.</p>  
    <p><strong>CLÁUSULA OITAVA</strong>. Constituem motivo para a rescisão automática do presente Termo de Compromisso: </p>
    <p>I - A conclusão, abandono ou mudança de Curso, ou trancamento de matrícula do (a)  Estagiário (a);</p> 
    <p>II - O não cumprimento do convencionado neste Termo de Compromisso;</p> 
    <p> III- O abandono do estágio.</p>
    <p><strong>CLÁUSULA NONA</strong>. É assegurado ao (à) Estagiário (a), sempre que o estágio tenha duração igual ou superior a um ano, período de recesso de trinta dias, a ser gozado preferencialmente durante suas férias escolares. E proporcional aos estágios inferiores a um ano. O recesso de que trata esse artigo deverá ser remunerado quando o Estagiário receber bolsa ou outra forma de contraprestação e o auxílio transportes, conforme artigo 13º, § 1º e § 2º da Lei 11.788.</p>
    



    <div class="rodape" style="opacity: 60%;top: calc(1064px * 3 - 29.4px)">
        <h2>www.fatecitapira.edu.br</h2>
        <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
    </div>
    </div>

    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>


    <p><strong>CLÁUSULA DÉCIMA</strong>. Assim, materializado e caracterizado, o presente Estágio, segundo a legislação, não acarretará vínculo empregatício de qualquer natureza entre o (a) Estagiário (a) e a Concedente, nos termos do que dispõem o Artigo 12º da Lei nº 11.788/08. </p> 
    <p><strong>CLÁUSULA DÉCIMA PRIMEIRA</strong>. As partes elegem o Foro da Comarca de Itapira-SP, com expressa renúncia de outro, por mais privilegiado que seja para dirimir qualquer questão emergente do presente Termo de Compromisso.</p>
    <p>Por estarem de inteiro e comum acordo com as condições e dizeres deste instrumento, as partes assinam-no em 3 (três) vias de igual teor e forma, todas assinadas pelas partes, depois de lido, conferido e achado conforme em todos os seus termos.</p>
    <p>CIDADE, XX de XXXXX de 20XX.</p> 
    <div class="assinatura" style="display: flex;justify-content: space-evenly;margin-top:200px">
        <div class="box" style="display: flex;flex-direction: column;align-items: baseline;width: 20%;word-wrap: break-word;">(NOME DO ESTAGIÁRIO)</div>
        <div class="box" style="display: flex;flex-direction: column;align-items: baseline;width: 20%;word-wrap: break-word;">CONCEDENTE DE ESTÁGIO (nome completo/ carimbo e assinatura)</div>
        <div class="box" style="display: flex;flex-direction: column;align-items: baseline;width: 20%;word-wrap: break-word;">CEETEPS Prof. Me. Luiz Henrique Biazzoto Diretor da Faculdade de Tecnologia ”Ogari de Castro Pacheco”</div>
    
    
    </div>



    <div class="rodape" style="opacity: 60%;top: calc(1064px * 4 - 29.4px)">
        <h2>www.fatecitapira.edu.br</h2>
        <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
    </div>
    </div>

    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>

    <h1>Plano de Atividades de Estágio (PAE)</h1>
    <label for="idenaluno">Identificação do(a) aluno(a):</label>
    <div class="gridaluno" id="idenaluno">
        <div class="nome">Nome:${nomeestagiario}</div>
        <div class="matricula">Matrícula:${ra}</div>
        <!-- matricula nome curso semestre endereco bairro cep email -->
        <div class="curso">Curso:${curso}</div>
        <div class="semestre">Semestre:${semestre}</div>
        <div class="endereco">Endereço domiciliar:${enderecoestagiario}</div>
        <div class="bairro">Bairro:${estagiariobairro}<p style="margin-left: 15%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Telefone:${estagiariotelefone}</p></div>
        <div class="cep">CEP:${estagiariocep}<p style="margin-left: 20%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Cidade:${cidadeestagiario}</p><p style="margin-left: 10%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Estado: ${estado}</p></div>
        <div class="email">Endereço eletrônico (e-mail):${estagiarioemail}<!--<p style="margin-left:10%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Site:</p>>--></div>
    </div>
    <br>
    <label for="idenempresa" >Identificação da empresa:</label>
    <div class="gridempresa">
    <div class="endereco">Endereço:${enderecoempresa}</div>
    <div class="email">Endereço eletrônico (e-mail):${emailempresa}<!--<p style="margin-left: 40%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Site:</p>--></div>
    <div class="cep">CEP:${cepempresa}<p style="margin-left: 15%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Cidade:${cidadeempresa}</p><p style="margin-left: 10%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Estado: ${estadoempresa}</p></div>
    <div class="bairro">Bairro:${bairroempresa}<p style="margin-left: 20%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Telefone:${telefoneempresa}</p></div>
    <div class="divisao">Divisão ou departamento de aplicação do estágio:${departamento}</div>
    <div class="nome1">Nome da empresa:${nomeempresa}</div>
    <div class="nomesup">Nome do supervisor:${nomerepresentante}</div>
    <div class="cargosup">Cargo do supervisor: <br/><p style="margin:0;padding:0;padding-left:3px;">${representantecargo}</p><p style="margin:0;padding:0;margin-left: 50%;margin-top:-4.5%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">Telefone do supervisor:</p> <br> <p style="margin:0;padding:0;margin-left: 50%;margin-top:-2.7%;font-family: 'Times New Roman', Times, serif;font-size: 16px;">${telefonerepresentante}</p></div>
    
    
    </div>
    <br>
    <label for="idenestagio">Identificação do estágio:</label>
    <div class="idenestagio" id="idenestagio">
        <!-- horario classificacao previsto valormensal real -->
        <div class="horario"><p style="font-size:18px">Horário: de segunda a sexta, das ${horarioentrada}h às ${horariosaida}h,aos sábados, das ____h às _____h.</p></div>
        <div class="classificacao"><p style="margin-left:0;margin-top: -20px;font-size:17px;">classificação:</p><p style="font-size: 20px;margin-left: -100px;">(X)obrigatório  ( )não obrigatório</p></div>
        <div class="previsto"><p style="margin-left:0;margin-top:-20px;font-size:14px;">Período previsto de realização:</p><p style="margin-left: -168px;font-size:18px">Início:${comeco}</p><p style="font-size: 18px;">Término:${fim}</p></div>
        <div class="real"><p style="margin-left:0;margin-top:-20px;font-size:14px;white-space: nowrap;">Período real de execução:</p><p style="margin-left: -140px;font-size:18px">Início:___/___/____</p><p style="font-size: 18px;">Término:___/___/____</p></div>
        <div class="valormensal"><p style="margin-left:0;margin-top:-20px;font-size:17px;">Valor mensal da bolsa estágio</p> <p style="margin-left:-200px;font-size: 20px;">R$ ${salario}</p></div>
    
    </div>
    
    




    <div class="rodape" style="opacity: 60%;top: calc(1064px * 5 - 29.4px)">
        <h2>www.fatecitapira.edu.br</h2>
        <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
    </div>
    </div>

    <div class="folha">
        <div class="linhacabecalho" style="opacity: 60%;">
            <div class="nd">
    <img src="marcadagua1.png" alt="" id="minhaimagem" >
    <img src="marcadagua2.png" alt="" id="minhaimagem2" >
</div>
    <h1 >Fatec de Itapira “Ogari de Castro Pacheco”</h1>
    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 9pt;color: black;margin-bottom: 30px;">Curso Superior de Tecnologia em Desenvolvimento de Software Multiplataforma</h1>
    </div>
    <label for="gridatividades">Cronograma (escreva a seguir as atividades que serão desenvolvidas no estágio. Explique cada uma resumidamente e inclua linhas, se necessário):</label>
    <div class="gridatividades" id="gridatividades">
    <div class="a1"><p style="font-size:10px;margin-top:0;margin-left: 0;">Atividade:</p>                               <p style="margin:5px">      ${atividade}       </p>                   </div>
    <div class="a2"><p style="font-size:10px;margin-top:0;margin-left: 0;">Descrição da atividade</p>                   <p style="margin:5px">      ${descricao}       </p>                   </div>
    <div class="a3"><p style="font-size:10px;margin-top:0;margin-left: 0;">Objetivo ou resultado esperado:</p>          <p style="margin:5px">      ${objetivo}       </p>                   </div>
    <div class="a4"><p style="font-size:10px;margin-top:0;margin-left: 0;">Período previsto (inicio e término)</p>      <p style="margin:5px">      ${periodo}       </p>                   </div>
    
    
    </div>
    <!-- gridfinal empresa estagiario cordenador -->
    <div class="gridfinal">
        <div class="empresa">
            <p style="margin:0;">Empresa:</p>
            <p style="font-size: 15px;">DECLARAÇÃO: plano definido em:</p><br>
            <p style="font-size: 15px;margin-top:-10px">___/___/______</p>
            
            <p style="margin:0;padding:0;margin-top:160px;margin-left:5px;">(carimbos da empresa com CNPJ e do supervisor, com sua assinatura)</p>
        </div>
        <div class="estagiario">
            <p style="margin:0;">Estagiário:</p>
            <p style="margin:0;margin-top: 60px;">Identificação e assinatura:</p>
        </div>
        <div class="cordenador">
            <p style="margin:0;">Coordenador de estágios:</p>
            <p style="font-size:18px;margin-top:0px;">( )Aprovado</p><br>
            <p style="font-size:18px;margin-top:-35px;">( )Reprovado. Motivo:______________________________________________________________________________________________________________________________</p>   
            <p style="font-size:16px;margin-top:-36px;margin-left: 250px;">Data: ___/___/______</p>
            <p>(carimbos e assinatura)</p>
    
        
        
        </div>
    </div>





    <div class="rodape" style="opacity: 60%;top: calc(1064px * 6 - 29.4px)">
        <h2>www.fatecitapira.edu.br</h2>
        <h3>Rua Tereza Lera Paoleti, 590  •  Jardim Bela Vista  •  13.974-080  •  Itapira  •  SP  •  Tel.: (19) 3843.1996</h3>
    </div>
    </div>






</body>
</html>`


var novaJanela = window.open();


novaJanela.document.write(html);

var imagem1 = document.createElement('img');
var imagem2 = document.createElement('img');

var totalImagens = 2;
var imagensCarregadas = 0;

function verificarCarregamento() {
    imagensCarregadas++;
    if (imagensCarregadas === totalImagens) {
        novaJanela.print();
    }
}

imagem1.onload = verificarCarregamento;
imagem2.onload = verificarCarregamento;

// Defina os src após atribuir onload handlers
imagem1.src = "marcadagua1.png";
imagem2.src = "marcadagua2.png";



document.getElementById("formulario").submit();
        }
         
    </script>


</body>
</html>