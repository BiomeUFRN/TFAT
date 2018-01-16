<?php

$mysqlAddress = "127.0.0.1";
$tfatServerAddress = "127.0.0.1";
$pythonPath = "python"
$mysqlUser = "<insert_username>";
$mysqlUserPasswd = "<insert_password>";
$dbName = "tfat_db";

function getMysqli(){
    
    $mysqli = new mysqli($mysqlAddress, $mysqlUser, $mysqlUserPasswd, $dbName);

	echo mysqli_connect_error();
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    return $mysqli;
}

?>