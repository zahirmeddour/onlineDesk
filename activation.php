<?php

$serial = retPost("serial");
$remoteIP = getRemoteIP();

$mysql = new My();
$mysql->myqsldb_Connect();
$rows = $mysql->mysqldb_query(
    "SELECT SerialCode, Status " .
    "FROM Serial " .
    "WHERE SerialCode = '" . $serial . "' " .
    "AND Status = 'active')");
if ($rows[1] == 'active') {
    die ('cette clé est deja utilisé!');
} else {
    $mysql->mysqldb_query(
        "UPDATE Serial " .
        "SET Status = 'active' " .
        "WHERE code = '" . $serial . "'");
    $mysql->mysqldb_query(
        "UPDATE Serial " .
        "SET IPAddress = '" . $remoteIP . "' " .
        "WHERE code = '" . $serial . "'");
    $mysql->mysqldb_query(
        "UPDATE Serial " .
        "SET ActivationDate = '" . date('d/m/Y') . "' " .
        "WHERE code = '" . $serial . "'");
}
$mysql->mysqldb_close();
