<?php
include("../conecta-inc.php");

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
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
    echo "A consulta retornou mais de um registro!";
  }
  $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Detalhes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 20px;
    }
    .details-label {
      font-weight: bold;
    }
    .details-value {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h3 class="mt-4 mb-4">Detalhes do Jogo</h3>
    <a href="index.php" class="mb-3 d-block">Retornar para página inicial</a>

    <div class="details-label">Título:</div>
    <p class="details-value"><?php echo $titulo; ?></p>

    <div class="details-label">Plataforma:</div>
    <p class="details-value"><?php echo $plataforma; ?></p>

    <div class="details-label">Gênero:</div>
    <p class="details-value"><?php echo $genero; ?></p>

    <div class="details-label">Tipo de mídia:</div>
    <p class="details-value"><?php echo $tipo_midia; ?></p>

    <div class="details-label">Número de jogadores:</div>
    <p class="details-value"><?php echo $num_jogador; ?></p>

    <div class="details-label">Data de aquisição:</div>
    <p class="details-value"><?php echo $data_aquisicao; ?></p>

    <div class="details-label">Sinopse:</div>
    <p class="details-value"><?php echo $sinopse; ?></p>
  </div>

  <!-- Adiciona os scripts JavaScript do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
