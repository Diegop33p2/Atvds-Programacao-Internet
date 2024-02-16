<!DOCTYPE html>
<html>
<head>
  <title>Sistema de gerenciamento de Jogos</title>
  <!-- Adicione os links do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Sistema de Gerenciamento de Jogos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="crud/create-update.php">Adicionar Jogo</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h3>Listagem de jogos</h3>

    <?php
    include("../conecta-inc.php");
    $sql = "SELECT id, titulo, genero FROM jogos";
    $result = $conn->query($sql);

    echo '<table class="table table-striped table-bordered">';
    echo "<thead class='table-dark'>
            <tr>
              <th>#ID</th>
              <th>Título</th>
              <th>Gênero</th>
              <th>Ver detalhes</th>
              <th>Editar</th>
              <th>Remover</th>
            </tr>
          </thead>
          <tbody>";

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["titulo"] . "</td>";
        echo "<td>" . $row["genero"] . "</td>";
        echo "<td>" . '<a href="crud/detalhes.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Visualizar</a>' . "</td>";
        echo "<td>" . '<a href="crud/create-update.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Atualizar</a>' . "</td>";
        echo "<td>" . '<a href="crud/remove.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Remover</a>' . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr>";
      echo "<td colspan='6'>Não foram encontrados resultados</td>";
      echo "</tr>";
    }
    echo "</tbody></table>";

    $conn->close();
    ?>

  </div>

  <!-- Adicione os scripts JavaScript do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
