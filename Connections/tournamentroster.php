<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_tournamentroster = "localhost";
$database_tournamentroster = "tournamentroster";
$username_tournamentroster = "root";
$password_tournamentroster = "";

$tournamentroster = mysql_pconnect($hostname_tournamentroster, $username_tournamentroster, $password_tournamentroster) or trigger_error(mysql_error(),E_USER_ERROR); 
?>