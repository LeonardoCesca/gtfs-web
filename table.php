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
        <title>Informações sobre Onibus</title>
    </head>
    <body>
        <div id="container">
            <h1>Onibus - Porto Alegre</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Número Linha</th>
                        <th>Orgão</th>
                        <th>Linha</th>
                        <th>Itinerário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']) ?></td>
                            <td><?php echo htmlspecialchars($row['route_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['agency_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_short_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_long_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_desc']); ?></td>

                            <!-- Outras linhas de registros -->
                            <!-- <td><?php echo htmlspecialchars($row['route_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_url']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_color']); ?></td>
                            <td><?php echo htmlspecialchars($row['route_text_color']); ?></td> -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>
