<?php
// 外部ファイルを読み込む
include("funcs.php");

$name = $_POST["name"];
$mail = $_POST["mail"];

?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>

<!-- echoする瞬間に、hの関数を使う -->
お名前：<? echo h($name); ?>
EMAIL：<? echo h($mail); ?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>