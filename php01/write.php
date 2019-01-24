<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>
This is a Pen. とdata.txt に書き込みます。
<?php
$name = $_POST["name"];
$mail = $_POST["mail"];

//文字作成
$str = date("Y-m-d H:i:s").",".$name.",".$mail;


//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\r\n");

// .プラスの意味がある
// \n 改行するためのコード　opition キー押しながら、¥マークを押す
fclose($file);
?>


<ul>
<li><a href="#">戻る</a></li>
</ul>
</body>
</html>