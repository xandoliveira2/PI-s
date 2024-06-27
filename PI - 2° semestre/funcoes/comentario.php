<!-- <?php
$id = $_POST['id'];
$sql = "SELECT comentario FROM tb_documentos WHERE id = $id";
include "classes/Conexao.php";
$resultado = $conexao->query($sql);
$comentario = $resultado->fetchAll();
if (!isset($comentario['comentario'])){
    header("Location:alunoacompanhar.php");
    echo "AOPA";
}
else{    

    header("Location:alunoacompanhar.php");
    echo "<script> alert('$comentario')</script>";
}
?> -->