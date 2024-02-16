<html>
  <head>
    <title>PHP - listagem com statement</title>
  </head>
  <body>
  <h3>Listagem de games - prepared statements</h3>
    <?php
include("conecta-inc.php"); //usamos nossa conexão
$stmt = $conn->prepare("SELECT * FROM jogos WHERE id > ?");
$stmt->bind_param("i", $_GET["id"]); //
$stmt->execute(); //executa o statement
$result = $stmt->get_result(); //executamos a query no objeto de conexão
if ($result->num_rows > 0) {
// monta os dados de saída linha a linha
while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"]. " - Titulo: " . $row["titulo"]. " " . $row["genero"]. "<br>";
} //fim do while
} else {
echo "0 results found"; //Caso o select não retorne resultados
}
$stmt->close(); //fecha o statement
$conn->close(); //fecha a conexão no corpo da página, já que temos uma verificação dentro do include

     ?> 
  </body>
</html>