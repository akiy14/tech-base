<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
?>