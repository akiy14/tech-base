<?php
 $dsn = 'mysql:dbname=xxxdb;host=localhost';
 $user = 'xxxuser';
 $password = 'xxxpassword';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING));
 
 
 $id=1;
 $name="a"; //4-7
 $comment="こんにちは";
 $sql='UPDATE tbtest SET name=:name, comment=:comment WHERE id=:id';
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':name',$name, PDO::PARAM_STR);
 $stmt->bindParam('comment',$comment, PDO::PARAM_STR);
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