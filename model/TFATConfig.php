<?php

function getTFATServerAddress(){
    return "http://127.0.0.1";
}

function getPythonPath(){
    return "python";
}

function getMysqli(){
    $mysqlUser = "<insert_username>";
    $mysqlUserPasswd = "<insert_password>";
    $dbName = "tfat_db";
    $mysqlAddress = "127.0.0.1";

    $mysqli = new mysqli($mysqlAddress, $mysqlUser, $mysqlUserPasswd, $dbName);
    return $mysqli;


?>