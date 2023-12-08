<?php

$mysql = new My();
$mysql->myqsldb_Connect();

$mysql->mysqldb_close();
$row = $mysql->mysqldb_query("SELECT IPAddress FROM Serial");

for ($i = 0; $i < count($rows); $i++) {
    if ($rows[$i][0] == '127.0.0.1') {
        continue;
    }

    $res = request('https://api.ipgeolocation.io/ipgeo?apiKey=' .
	    $api_key .
	    '&ip=' . $rows[$i][0] .
	    '&fields=city&lang=fr');

    $decoded = retJSON($res);
    $mysql->mysqldb_query("UPDATE Serial " .
	    		            "SET geolocation = '" . $decoded->city .
			                "' WHERE IPAddress = '" . $rows[$i][0] . "'");
}
redirectTo(getServerIP() . '/index.php');
