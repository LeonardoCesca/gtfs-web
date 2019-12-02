<?php

session_start();
$timeout = 600;

if(isset($_SESSION['timeout'])) {
    $duracao = time() - (int) $_SESSION['timeout'];

    if($duracao > $timeout) {
        session_destroy();
        session_start();
    }
}

$_SESSION['timeout'] = time(); 

try {
    $pdo = new PDO("mysql:host=localhost;dbname=trabWeb", "root", "");

    $sql = 'SELECT id,
                    route_id,
                    agency_id,
                    route_short_name,
                    route_long_name,
                    route_desc,
                    route_type,
                    route_url,
                    route_color,
                    route_text_color
            FROM routes';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./assets/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>Informações sobre Onibus</title>
    </head>
    <body>
        <div class="back-page">
            <a href="./index.php">    
                <img src="./assets/img/back.png" alt="Voltar">
            </a>
        </div>
        <div class="container center">
            <h1 class="text-center mt-3 mb-3">Ônibus - Porto Alegre</h1>
            <div class="c-table-container">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Número Linha</th>
                            <th>Orgão</th>
                            <th>Linha</th>
                            <th>Itinerário</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $q->fetch()): ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['route_id'] ?></td>
                                <td><?php echo $row['agency_id']; ?></td>
                                <td><?php echo $row['route_short_name']; ?></td>
                                <td><?php echo $row['route_long_name']; ?></td>
                                <td class="c-garbage">
                                    <img class="c-garbage__img" src="./assets/img/lixo.png" alt="Lixeira" onclick="deletar('<?php echo $row['id'] ?>')">
                                </td>
                                
                                <!-- Outras linhas de registros -->
                                <!-- <td><?php echo $row['route_desc']; ?></td>
                                <td><?php echo $row['route_type']; ?></td>
                                <td><?php echo $row['route_url']; ?></td>
                                <td><?php echo $row['route_color']; ?></td>
                                <td><?php echo $row['route_text_color']; ?></td> -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function deletar(id) {
                let del = confirm('Você deseja excluir este registro?');
                if (del) {
                    location.href = 'delete.php?id='+ id;
                } else {
                    alert('Não foi possivel excluir o registro');
                }
            }
        </script>
    </body>
</html>
