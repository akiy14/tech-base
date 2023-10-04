<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <tite>mission_2-2</tite>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="comment" value="コメント">
        <input type="submit" name="subumit">
    </form>
<?php
 if(isset($_POST["comment"]) &&!empty($_POST["comment"])){
      $comment=$_POST["comment"];
  $filename="missopn_2-2.txt";
  $fp=fopen($filename,"w");
  fwrite($fp, $comment.PHP_EOL); //PHPEOL不要
  fclose($fp);
  if($comment=="完成"){
   echo "おめでとう！";
  }else{
   echo $comment."を受け付けました";
  }
}
?>
</body>
</html>