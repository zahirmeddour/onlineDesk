<?php

require_once("config.php");

$mysql = new My();
$mysql->myqsldb_Connect();

$mysql->mysqldb_close();
$res = $mysql->mysqldb_query("SELECT IPAddress FROM Serial");

while ($row = mysqli_fetch_array($res)) {
    if ($row[0] == '127.0.0.1') {
        continue;
    }
    $curlResult = request(
        'https://api.ipgeolocation.io/ipgeo?apiKey=' .
        $config_api_key .
        '&ip=' . $row[0] .
        '&fields=city&lang=fr');
    $decoded = retJSON($curlResult);
    $mysql->mysqldb_query(
        "UPDATE Serial " .
        "SET geolocation = '" . $decoded->city .
        "' WHERE IPAddress = '" . $row[0] . "'");
}
redirectTo(getServerIP() . '/index.php');
