<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
<?php
$dsn='mysql:dbname=xxxdb; host=localhost'; //データベース接続
$user='xxxuser';
$password='xxxpassword';
$pdo=new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$sql="CREATE TABLE IF NOT EXISTS tbtestm5" //テーブル作成
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name CHAR(32),"
."comment TEXT,"
."date datetime DEFAULT CURRENT_TIMESTAMP"
.");";
$stmt=$pdo->query($sql);

if(!empty($_POST["name"])&& !empty($_POST["str"]) &&empty($_POST["edit2"])){ //投稿フォーム
  $name=$_POST["name"];
  $comment=$_POST["str"];
  $date=date("Y/m/d H:i:s");
  
  $sql="INSERT INTO tbtestm5(name, comment, date) VALUES(:name, :comment, :date)";
  $stmt=$pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->bindParam(':date', $date, PDO::PARAM_STR);
  $stmt->execute();
}

if(!empty($_POST["delete"])){ //削除機能
        $id=$_POST["delete"];
        $sql='delete from tbtestm5 where id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
}

if(!empty($_POST["edit"])){//編集選択機能
     $eid=$_POST["edit"];
     $sql='SELECT*FROM tbtestm5 WHERE id=:eid';
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam(':eid',$eid, PDO::PARAM_INT);
     $stmt->execute();
     $results=$stmt->fetchAll();
        foreach($results as $row){
          $name2=$row['name'];
          $str2=$row['comment'];
        }
}

 if(!empty($_POST["edit2"])){ //編集実行機能
      $id=$_POST["edit2"];
      $name=$_POST["name"];
      $comment=$_POST["str"];
      $date=date("Y/m/d H:i:s");
 
   $sql='UPDATE tbtestm5 SET name=:name, comment=:comment, date=:date WHERE id=:id';
   $stmt=$pdo->prepare($sql);
   $stmt->bindParam(':name', $name, PDO::PARAM_STR);
   $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
   $stmt->bindParam(':date', $date, PDO::PARAM_STR);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();
 }

?>
<form action="" method="post">
        <input type="text" name="name" placeholder="名前" 
               value="<?php if(!empty($name2)){echo $name2;}?>"><br>
        <input type="text" name="str" placeholder="コメント" 
               value="<?php if(!empty($name2)){echo $str2;}?>"><br>
        <input type="text" name="edit2"
               value="<?php if(!empty($eid)){echo $eid;}?>"><br>
        
        <input type="submit" name="submit" value="送信"><br> <!--入力-->
        
        <br>
        <input type="number" name="delete" placeholder="削除番号"><br>
        
        <input type="submit" name="submit" value="削除"><br> <!--削除-->
        
        <br>
        <input type="number" name="edit" placeholder="編集番号"><br>
        
        <input type="submit" name="subumit" value="編集"> <!--編集-->
 </form>
<?php //ブラウザ表示
$sql='SELECT*FROM tbtestm5';
$stmt=$pdo->query($sql);
$results=$stmt->fetchAll();
foreach($results as $row){
    echo $row['id'].' ';
    echo $row['name'].' ';
    echo $row['comment'].' ';
    echo $row['date'].'<br>';
}
?>
</body>
</html>