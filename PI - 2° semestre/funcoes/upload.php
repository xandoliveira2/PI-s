<?php
    include "../classes/Conexao.php";
    session_start();
    try {
        // Configuração para lançar exceções em caso de erro
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['assinatura'])) {    
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["documento"])) {
            $documento = $_FILES["documento"]["tmp_name"];
            $nome = $_POST["documentonome"];
            $assinado = "assinado";
            $id = $_SESSION['id'];
            $status = "pendente"; // Defina o status inicial como pendente

            // Lê o conteúdo do arquivo
            $documentoConteudo = file_get_contents($documento);

            // Prepara a instrução SQL para inserir o documento na tabela tb_documentos
            $stmt = $conexao->prepare("INSERT INTO tb_documentos (documento, status,aluno_id, nome,assinado) VALUES (:documento, :status, :id ,:nome, :assinado)");
            // Associa os parâmetros
            $stmt->bindParam(':documento', $documentoConteudo, PDO::PARAM_LOB); // PDO::PARAM_LOB é usado para campos BLOB
            $stmt->bindParam(':status', $status);   
            $stmt->bindParam(':nome', $nome); // Adicionando o parâmetro :nome
            $stmt->bindParam(':id', $id); // Adicionando o parâmetro :nome
            $stmt->bindParam(':assinado',$assinado);
            
            // Executa a instrução preparada
            if ($stmt->execute()) {
                echo "<script>window.alert('Documento enviado com sucesso!')</script>";
                echo "<script>window.location.href = '../views/alunos/aluno-perfil.php'</script>";
            } else {
                echo "Erro ao enviar o documento.";
            }
        }}
        else{
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["documento"])) {
            $documento = $_FILES["documento"]["tmp_name"];
            $nome = $_POST["documentonome"];
            $id = $_SESSION['id'];
            $status = "pendente"; // Defina o status inicial como pendente

            // Lê o conteúdo do arquivo
            $documentoConteudo = file_get_contents($documento);

            // Prepara a instrução SQL para inserir o documento na tabela tb_documentos
            $stmt = $conexao->prepare("INSERT INTO tb_documentos (documento, status,aluno_id, nome) VALUES (:documento, :status, :id ,:nome)");
            // Associa os parâmetros
            $stmt->bindParam(':documento', $documentoConteudo, PDO::PARAM_LOB); // PDO::PARAM_LOB é usado para campos BLOB
            $stmt->bindParam(':status', $status);   
            $stmt->bindParam(':nome', $nome); // Adicionando o parâmetro :nome
            $stmt->bindParam(':id', $id); // Adicionando o parâmetro :nome
            
            // Executa a instrução preparada
            if ($stmt->execute()) {
                echo "<script>window.alert('Documento enviado com sucesso!')</script>";
                echo "<script>window.location.href = '../views/alunos/aluno-perfil.php'</script>";
            } else {
                echo "Erro ao enviar o documento.";
                
            }
        }
        }
    } catch(PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }

    // Não é necessário fechar a conexão aqui, pois ela é gerenciada pela classe de conexão
?>
