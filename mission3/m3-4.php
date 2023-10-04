<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
<?php
 $filename="mission3-4.txt";
 if(!empty($_POST["name"])&& !empty($_POST["str"])&& empty($_POST["edit2"])){
   $name=$_POST["name"];
  $str=$_POST["str"];
  $date=date("Y/m/d H:i:s");
 
 if(file_exists($filename)){
     $num=count(file($filename))+1;
 }else{
     $num=1;
 } $comment=$num."<>".$name."<>".$str."<>".$date;
        $fp=fopen($filename,"a");
        fwrite($fp, $comment.PHP_EOL);
        fclose($fp);
 }  
 
if(!empty($_POST["delete"])){ //削除機能
        $delete=$_POST["delete"];
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        $fp=fopen($filename,"w");
     foreach($lines as $line){
             $elements=explode("<>",$line);
             $postnum=$elements[0];
                 if($postnum != $delete){
                    fwrite($fp, $line.PHP_EOL);
                }elseif($postnum == $delete){
                    fwrite($fp,"");
        }
        }fclose($fp);
}

if(!empty($_POST["edit"])){//編集選択機能
     $edit=$_POST["edit"];
     $lines=file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        $elements=explode("<>",$line);
        $postnum=$elements[0];
         if($postnum == $edit){
            $name2=$elements[1];
            $str2=$elements[2];
         }             
    }   
}
 if(!empty($_POST["edit2"])){ //編集実行機能
      $edit2=$_POST["edit2"];
      $name=$_POST["name"];
      $str=$_POST["str"];
      $date=date("Y/m/d H:i:s");
      
      $lines=file($filename,FILE_IGNORE_NEW_LINES);
      $fp=fopen($filename,"w");
    foreach($lines as $line){
        $elements=explode("<>",$line);
        $postnum=$elements[0];
         if($postnum == $edit2){
             fwrite($fp, $edit2."<>".$name."<>".$str."<>".$date.PHP_EOL);
         }elseif($postnum != $edit2){
             fwrite($fp, $line.PHP_EOL);
         }
         
 }fclose($fp);
   }
?>
<form action="" method="post">
        <input type="text" name="name" placeholder="名前" 
               value="<?php if(!empty($name2)){echo $name2;}?>"><br>
        <input type="text" name="str" placeholder="コメント" 
               value="<?php if(!empty($name2)){echo $str2;}?>"><br>
        <input type="hidden" name="edit2"
               value="<?php if(!empty($edit)){echo $edit;}?>">
        <input type="submit" name="submit" value="送信"><br> <!--入力-->
        <br>
        <input type="number" name="delete" placeholder="削除番号">
        <input type="submit" name="submit" value="削除"><br> <!--削除-->
        <br>
        <input type="number" name="edit" placeholder="編集番号">
        <input type="submit" name="subumit" value="編集"> <!--編集-->
    </form>
<?php
if(file_exists($filename)){
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
        $elements=explode("<>",$line);
            for($i=0; $i<count($elements); $i++){
             echo $elements[$i]." ";
        }echo "<br>";
        }
     } 
?>
</body>
</html>