<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
 
 $name='c'; //4-5
 $comment='こんにちはc';
 
 $sql="INSERT INTO tbtest(name, comment) VALUES(:name, :comment)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':name', $name, PDO::PARAM_STR);
 $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
 $stmt->execute();
?>