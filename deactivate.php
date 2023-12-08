<?php

$serial = retPost('serialToDeactivate');
if (!$serial) {
    redirectTo(getServerIP());
}

$mysql = new My();
$mysql->myqsldb_Connect();
$result = $mysql->mysqldb_query("UPDATE Serial " .
				                "SET Status = 'non-active', " .
                				"ActivationDate = '01/01/2000', " .
				                "IPAddress = '127.0.0.1', " .
				                "geolocation = 'internet', " .
				                "WHERE SerialCode = '" . $serial . "'");
if (!$result) {
    redirectTo(getServerIP() . '/index.php?serial=' . $serial);
} else {
    redirectTo(getServerIP());
}
$mysql->mysqldb_close();
