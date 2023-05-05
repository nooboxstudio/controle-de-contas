<?php
require_once('./config/connection.php');

$hostname_conn = $servername;
$database_conn = $dbname;
$username_conn = $username;
$password_conn = $password;
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>