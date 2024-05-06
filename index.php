<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
<div class="indexbtns">
    <button class="button"><a href="form.php">ALTERAR LISTA DE EVENTOS</a></button>
</div>


    
</body>
</html>

<?php
function listarEventos() {
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "compromissos";
    $con = mysqli_connect($host, $user, $pass, $base);

    if (!$con) {
        die("Conexão falhou " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM eventos";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

    echo "<table><tr><td>  Codigo do Evento  </td><td>  Nome do Evento  </td><td>  Data do Evento  </td><td>  Hora de inicio  </td><td>  Hora do fim  </td><td>  Descrição  </td>
    <td>  Local do evento  </td><td>  Responsavel do evento  </td></tr>";

    while($escrever=mysqli_fetch_array($result)){
        echo "<tr><td>" . $escrever['id'] . "</td><td>" . $escrever['nome_evento'] . "</td><td>" . $escrever['data_evento'] . "</td><td>" . $escrever['hora_inicio'] . "</td><td>" . $escrever['hora_fim'] . "</td>
        <td>" . $escrever['descricao'] . "</td><td>" . $escrever['local_evento'] . "</td><td>" . $escrever['responsavel'] . "</td></tr>";
    } echo "</table>";

    mysqli_close($con);
}else {
    echo "Erro ao listar eventos " . mysqli_error($con);
}

}

echo "<div class='titulo'><h1>Eventos</h1></div><div class='geral'>";
listarEventos();
echo "</div>";
?>