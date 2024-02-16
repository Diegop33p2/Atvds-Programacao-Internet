<!DOCTYPE html>
<html>
<head>
  <title>Listagem de Games</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h3>Listagem de games</h3>

    <?php
    include("conecta-inc.php");

    $sql = "SELECT id, titulo, genero FROM jogos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<ul class="list-group">';
      while ($row = $result->fetch_assoc()) {
        echo '<li class="list-group-item">ID: ' . $row["id"] . ' - Título: ' . $row["titulo"] . ' - Gênero: ' . $row["genero"] . '</li>';
      }
      echo '</ul>';
    } else {
      echo "<p class='mt-3'>Nenhum resultado encontrado.</p>";
    }

    $conn->close();
    ?> 
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
