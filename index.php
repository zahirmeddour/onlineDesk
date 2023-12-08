<?php
require_once('functions.php');
require_once('mysql.class.php');

$mysql = new My();
$mysql->myqsldb_Connect();
$res = $mysql->mysqldb_query("SELECT id, SerialCode, Stat, ActivationDate, IPAddress, geolocation " .
    "FROM Serial " .
    "ORDER BY id DESC");
$duplicates = $mysql->mysqldb_query("SELECT COUNT(SerialCode) AS SerialCodeCount, SerialCode, MIN(id) AS MinID " .
    "FROM Serial GROUP BY SerialCode HAVING COUNT(SerialCode) > 1;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form action="index.php" method="post" class="row" style="margin: 15px; border: 1px black solid; margin: 10px;">
        <div class="col">
            <input type="text" name="recherche" placeholder="recherche" style="width: 200px; margin: 15px;">
            <?php
            if (!retPost("search")) {
                $res = $mysql->mysqldb_query(
                    "SELECT SerialCode " .
                    "FROM Serial " .
                    "WHERE SerialCode LIKE '%77-77-77-77%'");
            }
            ?>
        </div>
        <div class="col">
            <input type="submit" value="recherche" class="btn btn-secondary" style="margin: 15px;">
        </div>
    </form>
    <form action="deactivate.php" method="post" class="row"
          style="margin: 15px; border: 1px black solid; margin: 10px;">
        <div class="col">
            <input type="text" name="serialToDeactivate" placeholder="clé a rendre non-active"
                   style="width: 200px; margin: 15px;">
            <?php
            $serialCode = retGet('serialCode');
            echo "<h4 class='desactive-form'>La clé " . $serialCode . ' à etait desactivé</h4>';
            ?>
        </div>
        <div class="col">
            <input type="submit" value="desactivé" class="btn btn-secondary" style="margin: 15px;">
        </div>
    </form>
    <form enctype="multipart/form-data" action="upload.php.bak" method="post" class="row" style=
    "margin: 15px; border: 1px black solid; margin: 10px;">
        <div class="col">
            <input name="uploadfile" type="file" style="margin: 15px;">
        </div>
        <div class="col">
            <input type="submit" value="Upload" name="submit" class="btn btn-secondary" style="margin: 15px;">
        </div>
    </form>
    <div class="row" style="border: 1px black solid; margin: 10px;">
        <div class="col">
            <h3>Geolocaliser</h3>
        </div>
        <div class="col">
            <a href="geoLocalisation.php" class="btn btn-secondary" style="margin: 15px;">GEOLOCALISE</a>
        </div>
    </div>
    <div class="row" style="margin: 15px; border: 1px black solid; margin: 10px;">
        <h3 class="col" style="margin: 15px;">les dupliques</h3>
        <div class="col">
            <?php
            if ($duplicates != null) {
                while ($row = mysqli_fetch_array($duplicates)) {
                    echo '<p>' . $row[1] . '</p>';
                }
            }
            ?>
        </div>
    </div>
    <div class="row" style="margin: 15px;">
        <div class="col">
            <a href="index.php" class="btn btn-info" style="margin-left: 15px; margin: 15px;">Rafraichir</a>
        </div>
    </div>
</div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Clé</th>
        <th scope="col">Etat</th>
        <th scope="col">Date Activation</th>
        <th scope="col">Adresse IP</th>
        <th scope="col">Geolocalisation</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($res)) {
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td>' . $row[2] . '</td>';
        echo '<td>' . $row[3] . '</td>';
        echo '<td>' . $row[4] . '</td>';
        echo '<td>' . $row[5] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<?php
$mysql->mysqldb_close();
?>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
