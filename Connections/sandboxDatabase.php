<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_sandbox = "localhost";
$database_sandbox = "sandbox";
$username_sandbox = "root";
$password_sandbox = "root";

$sandbox = mysql_connect($hostname_sandbox, $username_sandbox, $password_sandbox) or trigger_error(mysql_error(),E_USER_ERROR); 
?>