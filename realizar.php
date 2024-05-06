<html>
    <body>
<link rel="stylesheet" href="css/style1.css">
    <div class="indexbtns">
    <button class="button"><a href="index.php">INICIO</a></button>
</div>
    </body>
    </html>
    
    <?php
    $codigo = $_POST['id'];
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $descricao = $_POST['descricao'];
    $local_evento = $_POST['local_evento'];
    $responsavel = $_POST['responsavel'];


        function cadastrarEvento($codigo, $nome_evento, $data_evento, $hora_inicio, $hora_fim, $descricao, $local_evento, $responsavel) {
            $host = "localhost:3306";
            $user = "root";
            $pass = "";
            $base = "compromissos";
            $con = mysqli_connect($host, $user, $pass, $base);
    
            if (!$con) {
                die("Conexão falhou ".mysqli_connect_error());
            }
    
            $sql = "INSERT INTO eventos (id, nome_evento, data_evento, hora_inicio, hora_fim, descricao, local_evento, responsavel) VALUES ('$codigo', '$nome_evento', '$data_evento', '$hora_inicio', '$hora_fim', '$descricao', '$local_evento', '$responsavel')";
            
            if (mysqli_query($con, $sql)) {
                echo "<p>Evento cadastrado com sucesso</p>";
            } else {
                echo "Erro ao cadastrar evento " . mysqli_error($con);
            }
    
            mysqli_close($con);
        }

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
        


    function atualizarEvento($codigo, $nome_evento, $data_evento, $hora_inicio, $hora_fim, $descricao, $local_evento, $responsavel) {
        $host = "localhost:3306";
            $user = "root";
            $pass = "";
            $base = "compromissos";
            $con = mysqli_connect($host, $user, $pass, $base);

            if (!$con) {
                die("Conexão falhou " . mysqli_connect_error());
            }


        $sql = "UPDATE eventos SET nome_evento='$nome_evento', data_evento='$data_evento', hora_inicio='$hora_inicio', hora_fim='$hora_fim', descricao='$descricao', local_evento='$local_evento', responsavel='$responsavel' WHERE id = $codigo";

        if (mysqli_query($con, $sql)) {
            echo "<p>Evento atualizado com sucesso</p>";
        } else {
            echo "Erro ao atualizar evento " . mysqli_error($con);
        }

        mysqli_close($con);
    }

    function removerEvento($codigo) {
        $host = "localhost:3306";
            $user = "root";
            $pass = "";
            $base = "compromissos";
            $con = mysqli_connect($host, $user, $pass, $base);

            if (!$con) {
                die("Conexão falhou " . mysqli_connect_error());
            }
            $sql = "DELETE FROM eventos WHERE id = $codigo";

            if (mysqli_query($con, $sql)) {
                echo "<p>Evento excluido com sucesso</p>";
            } else {
                echo "Erro ao excluir evento " . mysqli_error($con);
            }
    
            mysqli_close($con);
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['submit'] == 'Cadastrar') {
                cadastrarEvento($codigo, $nome_evento, $data_evento, $hora_inicio, $hora_fim, $descricao, $local_evento, $responsavel);
                echo "<div class='titulo'><h1>Eventos</h1></div><div class='geral'>";
                listarEventos();
                echo "</div>";
            } elseif ($_POST['submit'] == 'Excluir') {
                removerEvento($codigo);
                echo "<div class='titulo'><h1>Eventos</h1></div><div class='geral'>";
                listarEventos();
                echo "</div>";
            } elseif ($_POST['submit'] == 'Atualizar') {
                atualizarEvento($codigo, $nome_evento, $data_evento, $hora_inicio, $hora_fim, $descricao, $local_evento, $responsavel);
                echo "<div class='titulo'><h1>Eventos</h1></div><div class='geral'>";
                listarEventos();
                echo "</div>";
            }elseif ($_POST['submit'] == 'Listar') {
                echo "<div class='titulo'><h1>Eventos</h1></div><div class='geral'>";
                listarEventos();
                echo "</div>";
            }
        }

?>
