<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
 
 $id=2;//4-8
 $sql='delete from tbtest where id=:id';
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 $stmt->execute();

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