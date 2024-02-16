<?php
include("../conecta-inc.php");

//cria as variaveis vazias.
$id = $num_jogador = $plataforma = $sinopse = $tipo_midia = $titulo = $genero = $data_aquisicao = "";
//primeiro grande bloco, verifica se foi enviado pressionando um botão e se tem ID (atualização)
if(isset($_POST["id"]) && !empty($_POST["id"])){
  //este bloco é executado se o for  for enviado usando o botão (POST)
  $id = $_POST["id"];
  $num_jogador = trim($_POST["num_jogador"]);
  $plataforma = trim($_POST["plataforma"]);
  $sinopse = trim($_POST["sinopse"]);
  $tipo_midia = trim($_POST["tipo_midia"]);
  $titulo = trim($_POST["titulo"]);
  $genero = trim($_POST["genero"]);
  $data_aquisicao = trim($_POST["data_aquisicao"]);

  $sql = "UPDATE jogos SET num_jogador= $num_jogador, plataforma = '$plataforma', sinopse = '$sinopse', tipo_midia = '$tipo_midia', titulo = '$titulo', genero = '$genero', data_aquisicao='$data_aquisicao' WHERE id=$id";
  
  if ($conn->query($sql) === TRUE) {
      $conn->close(); //fecha a conexão antes de redirecionar
      header("location: index.php");
      exit();
  } else {
    echo "Error updating record: " . $conn->error;
    $conn->close(); //fecha a conexão
    } //fim do if conn

//fim do bloco if isset  
} elseif (isset($_GET["id"]) && !empty($_GET["id"])) { //elseif do primeiro isset
//Este bloco é executado se existir o parametro na  URL
$id = trim($_GET["id"]); //trata e armazena o parâmetro
$sql = "SELECT * FROM jogos WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $num_jogador = $row["num_jogador"];
    $plataforma = $row["plataforma"];
    $sinopse = $row["sinopse"];
    $tipo_midia = $row["tipo_midia"];
    $titulo = $row["titulo"];
    $genero = $row["genero"];
    $data_aquisicao = $row["data_aquisicao"];
     } else {
       echo "Erro fatal, mais de um registro encontrado na consulta.";
      }
$conn->close(); //fecha a conexão
} //fim do elseif isset
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["id"])) { //Verifica se foi pressionado o botão (POST) e ainda nao tem id (novo registro)
  //não possuimos o ID, criaremos um usert para um novo registro
  $num_jogador = trim($_POST["num_jogador"]);
  $plataforma = trim($_POST["plataforma"]);
  $sinopse = trim($_POST["sinopse"]);
  $tipo_midia = trim($_POST["tipo_midia"]);
  $titulo = trim($_POST["titulo"]);
  $genero = trim($_POST["genero"]);
  $data_aquisicao = trim($_POST["data_aquisicao"]);

  $sql = "INSERT INTO jogos (num_jogador, plataforma, sinopse, tipo_midia, titulo, genero, data_aquisicao) VALUES ($num_jogador,'$plataforma', '$sinopse', '$tipo_midia', '$titulo',
   '$genero', '$data_aquisicao' )";
  
  if ($conn->query($sql) === TRUE) {
      $conn->close(); //fecha a conexão antes de redirecionar
      header("location: index.php");
      exit();
  } else {
    echo "Erro ao inserir o registro: " . $conn->error;
    $conn->close(); //fecha a conexão
    } //fim do if conn


} //fim do if SERVER_REQUEST
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create/Update Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h3>Cadastrar/Atualizar Jogos</h3>
    <form action="create-update.php" method="POST">
      <a href="index.php">Cancelar e retornar para página inicial</a> <br>
      <input type="hidden" name="id" value="<?php echo $id; ?>"/>

      <div class="mb-3">
        <label for="titulo" class="form-label">Título/nome:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
      </div>

      <div class="mb-3">
        <label for="plataforma" class="form-label">Plataforma:</label>
        <input type="text" class="form-control" id="plataforma" name="plataforma" value="<?php echo $plataforma; ?>">
      </div>

      <div class="mb-3">
        <label for="genero" class="form-label">Gênero:</label>
        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $genero; ?>">
      </div>

      <div class="mb-3">
        <label for="tipo_midia" class="form-label">Tipo de mídia:</label>
        <input type="text" class="form-control" id="tipo_midia" name="tipo_midia" value="<?php echo $tipo_midia; ?>">
      </div>

      <div class="mb-3">
        <label for="data_aquisicao" class="form-label">Data de aquisição:</label>
        <input type="text" class="form-control" id="data_aquisicao" name="data_aquisicao" value="<?php echo $data_aquisicao; ?>">
      </div>

      <div class="mb-3">
        <label for="num_jogador" class="form-label">Quantidade de jogadores:</label>
        <input type="text" class="form-control" id="num_jogador" name="num_jogador" value="<?php echo $num_jogador; ?>">
      </div>

      <div class="mb-3">
        <label for="sinopse" class="form-label">Sinopse:</label>
        <textarea class="form-control" id="sinopse" name="sinopse" rows="5"><?php echo $sinopse; ?></textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>

  <!-- Adiciona os scripts JavaScript do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

