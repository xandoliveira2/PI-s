<?php
include "../../classes/Conexao.php";
try {
    // Conexão com o banco de dados usando PDO
    // Configuração para lançar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o ID do documento foi passado como parâmetro na URL
    if (isset($_GET['id'])) {
        $id_documento = $_GET['id'];
        
        // Prepara a consulta SQL para selecionar o documento pelo ID
        $stmt = $conexao->prepare("SELECT documento,nome FROM tb_documentos WHERE id = :id");
        $stmt->bindParam(':id', $id_documento);
        $stmt->execute();

        // Verifica se o documento foi encontrado
        if ($stmt->rowCount() == 1) {
            // Recupera o conteúdo do documento
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $documento = $row['documento'];
            $nome = $row['nome'];
            // Define o tipo de conteúdo do cabeçalho HTTP como PDF
            header('Content-Type: application/pdf');
            // Força o download do arquivo com um nome específico
            header("Content-Disposition: attachment; filename=$nome");
            // Envia o conteúdo do documento ao navegador
            echo $documento;
        } else {
            echo "Documento não encontrado.";
        }
    }
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

// Fecha a conexão
$conexao = null;
?>
