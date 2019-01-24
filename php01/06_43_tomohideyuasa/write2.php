<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>GSアカデミー　満足度調査</h1>
<br>
<div class="contact">

<a href="read.php">結果を見る</a>
<hr class="hr-text">
<a href="index2.php">アンケート調査に戻る（じゃんけんもやり直す）</a>
<hr class="hr-text">
<br>
<br>
<?php

$select2 = $_POST["select2"];

// rand( min, max );
$num = rand(1,3);
//おみくじ
if($select2==1){
    echo "自分はグー： ";
    if( $num == 1 ) {
    echo "相手はグー： あいこ";
    } else if ($num == 2){
    echo "相手はチョキ： 勝ち";   
    } else{
    echo "相手はパー：負け";
    }
};

if($select2==2){
    echo "自分はチョキ： ";
    if( $num == 1 ) {
    echo "相手はグー： 負け";
    } else if ($num == 2){
    echo "相手はチョキ： あいこ";   
    } else{
    echo "相手はパー：勝ち";
    }
};

if($select2==3){
    echo "自分はパー： ";
    if( $num == 1 ) {
    echo "相手はグー： 勝ち";
    } else if ($num == 2){
    echo "相手はチョキ： 負け";   
    } else{
    echo "相手はパー：あいこ";
    }
};


$name = $_POST["name"];
$mail = $_POST["mail"];
$select = $_POST['select'];
$memo = $_POST["memo"];


//文字作成
$str = date("Y-m-d H:i:s")."&".$name."&".$mail."&".$select."&".$memo;

//File書き込み
$file = fopen("data/data4.txt","a");	// ファイル読み込み
fwrite($file, $str."\r\n");

// .プラスの意味がある
// \n 改行するためのコード　opition キー押しながら、¥マークを押す
fclose($file);
?>


</div>


<br>
<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
<br>
</body>
</html>