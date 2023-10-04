<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <tite></tite>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="comment" placeholder="コメント">
        <input type="submit" name="subumit">
    </form>
<?php
 if(isset($_POST["comment"]) &&!empty($_POST["comment"])){
      $comment=$_POST["comment"];
  $filename="missopn_2-4.txt";
  $fp=fopen($filename,"a");
  fwrite($fp, $comment.PHP_EOL);
  fclose($fp);
  if($comment=="完成"){
   echo "おめでとう！";
  }else{
   echo $comment."を受け付けました<br>";
  }

if(file_exists($filename)){
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        echo $line."<br>";
    }
}
}
?>
</body>
</html>