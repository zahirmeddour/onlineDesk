<?php

require_once("SimpleXLSX.php");

use Shuchkin\SimpleXLSX;

$mysql = new My();
$mysql->myqsldb_Connect();
$excelFile = '/var/www/uploads/' . $_FILES['uploadfile']['name'];
if ($xlsx = SimpleXLSX::parse($excelFile)) {
    for ($i = 0; $i < count($xlsx->rows()); $i++) {
        $SerialCode = strval($xlsx->rows()[$i][0]);
        $mysql->mysqldb_query("INSERT INTO Serial (serialCode) VALUES (" . $SerialCode . ")");
    }
}
$mysql->mysqldb_close();
redirectto(getServerIP());
