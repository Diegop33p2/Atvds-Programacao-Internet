<?php
$dbhost = "db4free.net";
$dbname = "adsp22023";
$dbusername = "aluno123";
$dbpasswd = "ads@aluno";
    // Create connection
$conn = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Concectado com sucesso! Estatísticas do servidor: ", $conn->stat() , " <br>";
//echo "Encerrando a conexão!"; 
//$conn->close();
?>
