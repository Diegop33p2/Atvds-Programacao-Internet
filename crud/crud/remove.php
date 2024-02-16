<?php
include("../conecta-inc.php");

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  $id = trim($_GET["id"]); //trata e armazena o parâmetro
  $sql = "DELETE FROM jogos WHERE id = $id";
  if ($conn->query($sql) == TRUE) {
    echo "Registro excluído com sucesso!";
      
    } else { //else do if num_rows
      echo "Ocorreu um erro o executar o comando!";
  }//fim do else 
} //fim dos if isset
$conn->close();
header("location: index.php");
exit();
?>