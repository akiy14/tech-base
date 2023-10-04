<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset=UTF-8>
    <title>mission_1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num" placeholder="数字を入力">
        <input type="submit" name="submit">
    </form>
<?php
  if(isset($_POST["num"])){
      $num=$_POST["num"];
  $filename="m1-27.txt";
  $fp=fopen($filename,"a");
  fwrite($fp, $num.PHP_EOL);
  fclose($fp);
  echo "書き込み成功！<br>";
  
if(file_exists($filename)){
    $lines =file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        echo $line ;
    }
}  
 $num = $_POST["num"];
 if($num%3==0 &&$num%5==0){
        echo "FizzBuzz";
    }elseif($num==3){
        echo "Fizz";
    }elseif($num==5){
        echo "Buzz";
    }else{
        echo $num;
    }
}else{
    echo "-送信なし-";
}
?>
</body>
</html>