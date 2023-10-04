<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前"><br>
        <input type="text" name="str" placeholder="コメント">
        <input type="submit" name="submit"><br>
        <input type="number" name="delete" placeholder="削除番号">
        <input type="submit" name="submit" value="削除">
    </form>
<?php
 $filename="mission3-3ver3.txt";
 if(!empty($_POST["name"])&& !empty($_POST["str"])&& empty($_POST["delete"])){
   $name=$_POST["name"];
  $str=$_POST["str"];
  $date=date("Y/m/d H:i:s");
 
 if(file_exists($filename)){
     $num=count(file($filename))+1;
 }else{
     $num=1;
 }
 $comment=$num."<>".$name."<>".$str."<>".$date;
 
        $fp=fopen($filename,"a");
        fwrite($fp, $comment.PHP_EOL);
        fclose($fp);
 
      if(file_exists($filename)){
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
        $elements=explode("<>",$line);
            for($i=0; $i<count($elements); $i++){
             echo $elements[$i]." ";
        }echo "<br>";
        }
     } 
 }     
elseif(!empty($_POST["delete"])){
  $name=$_POST["name"];
  $str=$_POST["str"];
  $date=date("Y/m/d H:i:s");
 if(file_exists($filename)){
     $num=count(file($filename))+1;
 }else{
     $num=1;
 } $comment=$num."<>".$name."<>".$str."<>".$date;
 
        $delete=$_POST["delete"];
         
        if(file_exists($filename)){
            $lines=file($filename,FILE_IGNORE_NEW_LINES);
            $fp=fopen($filename,"w");
            foreach($lines as $line){
             $elements=explode("<>",$line);
                for($i=0; $i<count($elements); $i++)
                 $postnum=$elements[0];
                 if($postnum != $elements){
                    fwrite($fp, $comment.PHP_EOL);
                }
            }
        fclose($fp);
    echo $elements[$i]." ";
        }
}

?>
</body>
</html>