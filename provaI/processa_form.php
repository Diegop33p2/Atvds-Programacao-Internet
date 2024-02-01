<!DOCTYPE html>
<html>
<head>
  <title>DADOS DO FORMULARIO</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function generateProtocolNumber() {
    return str_pad(mt_rand(1, 9999), 6, '0', STR_PAD_LEFT);
  }
  $protocolNumber = generateProtocolNumber();

  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $cep = $_POST['cep'];
  $data_nascimento = $_POST['data'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $sexo = $_POST['sexo'];
  $matricula = $_POST['matricula'];
  $email = $_POST['email'];
  $tipo_sanguineo = $_POST['sangue'];
  $curso = $_POST['curso'];
  $assunto = $_POST['assunto']; 
  $descricao = $_POST['descricao'];

  $ext = strtolower(substr($_FILES['pdf']['name'], -4));
  $new_name = strtolower($nome) . "-" . strtolower($endereco) . "-" . $protocolNumber . $ext;
  $dir = 'pdfs/';
  $fullpath = $dir . $new_name;
  move_uploaded_file($_FILES['pdf']['tmp_name'], $fullpath);

echo "<p class='cor'>Requerimento/protocolo de nº $protocolNumber gerado com sucesso!<br></p>";
echo "<p class='cor'>Nome: $nome<br></p>";
echo "<p class='cor'>Endereço: $endereco<br></p>";
echo "<p class='cor'>CEP: $cep<br></p>";
echo "<p class='cor'>Data de Nascimento: $data_nascimento<br></p>";
echo "<p class='cor'>Cidade: $cidade<br></p>";
echo "<p class='cor'>Estado: $estado<br></p>";
echo "<p class='cor'>Sexo: $sexo<br></p>";
echo "<p class='cor'>Matrícula: $matricula<br></p>";
echo "<p class='cor'>Email: $email<br></p>";
echo "<p class='cor'>Tipo Sanguíneo: $tipo_sanguineo<br></p>";
echo "<p class='cor'>Curso: $curso<br></p>";
echo "<p class='cor'>Assunto: $assunto<br></p>";
echo "<p class='cor'>Descrição: $descricao<br></p>";


echo "<a href=\"$fullpath\">Ver PDF</a><br>";
}
?>
</body>
</html>





