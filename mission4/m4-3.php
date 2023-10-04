<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));

 $sql="CREATE TABLE IF NOT EXISTS tbtest" //4-2
 ."("
 ."id INT AUTO_INCREMENT PRIMARY KEY,"
 ."name char(32),"
 ."comment TEXT"
 .");";
 $stmt=$pdo->query($sql); 
 
  $sql='SHOW TABLES'; //4-3
 $result=$pdo->query($sql);
 foreach($result as $row){
     echo $row[0];
     echo '<br>';
 }
 echo "<hr>";
?>