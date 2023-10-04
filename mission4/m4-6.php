<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
 
 $sql='SELECT*FROM tbtest';//4-6
 $stmt=$pdo->query($sql);
 $results=$stmt->fetchAll();
 foreach($results as $row){
     echo $row['id'].',';
     echo $row['name'].',';
     echo $row['comment'].'<br>';
    echo "<hr>";
 }
?>