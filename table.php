<?php

require 'db.php';

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
        <link rel="stylesheet" href="./assets/css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>Informações sobre Onibus</title>
    </head>
    <body>
        <div class="container center">
            <h1 class="text-center mt-3 mb-3">Onibus - Porto Alegre</h1>
            <table class="table table-bordered table-condensed">
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
                                <a href="delete.php?id=<?php echo $row['id'];?>">
                                    <img class="c-garbage__img" src="./assets/img/garbage.png" alt="">
                                </a>
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
    </body>
</div>
</html>
