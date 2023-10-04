<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <tite>mission_2-1</tite>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="comment" value="コメント">
        <input type="submit" name="submit">
    </form>
<?php
 $comment=$_POST["comment"];
  echo $comment."を受け付けました";
?>
</body>
</html>