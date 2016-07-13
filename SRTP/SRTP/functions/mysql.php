<?php
function mysql_open(){
    $mysql_serverName = "localhost:3306";
    $mysql_userName   = "root";
    $mysql_password   = "00000000";
    $mysql_dbName     = "srtp_db";

    $conn = mysql_connect($mysql_serverName, $mysql_userName, $mysql_password);
    mysql_query("set names utf-8");
    mysql_select_db($mysql_dbName, $conn);
    return $conn;
 }
?>