<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF=8">
    <title>mission_1-24</title>
</head>
<body>
<a href="">リセット</a><!--←postパラメータを消します。原理は略-->
 <form action=""method="post">
     <input type="text" name="str" placeholder="何か入力">
     <input type="submit" name="submit">
 </form>
***<br>
1、ノーチェック:<br>
 <?php
     $str=$POST_["str"];//ここでエラーが出ることがあります
     echo"【".$str."】";
 ?>
***<br>
2、isset()チェック:<br>
<?php
    if(isset($_POST["str"])){
        $str=$_POST["str"];
        echo "【".$str."】";
    }else{
        echo "-post送信　なし-";
    }
?>
***<br>
3、empty()チェック(実際は！empty()で):<br>
<?php
if(!empty($_POST["str"])){
    $str=$_POST["str"];
    echo "【".$str."】";
}else{
    echo "-str 中身なし-";
}
?>
***<br>
</body>
</html>