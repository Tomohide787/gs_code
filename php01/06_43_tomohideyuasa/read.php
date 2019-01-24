<html>
<head>
<meta charset="utf-8">
<title>File結果の表示</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<h1>GSアカデミー　満足度調査</h1>
<br>
<div class="contact2">
<h2>調査結果</h2>
<br>

<table class="table" border='1' width="800">
<tr>
    <th width="100">入力時間</th>
    <th width="100">名前</th>
    <th width="200">メールアドレス</th>
    <th width="100">五段階評価</th>
    <th width="200">コメント</th>
</tr>

<?php

// ファイルを変数に格納
$filename = 'data/data4.txt';
 
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
 
// fgetsでファイルを読み込み、変数に格納
$txt = fgets($fp);





// whileで行末までループ処理
// echo '<tr>';
while (!feof($fp)) {
 
    // fgetsでファイルを読み込み、変数に格納
    $txt = fgets($fp);
    $str = explode("&", $txt);
    echo '<tr>';
    echo '<td width="100" style="word-wrap:break-word;">',$str[0],'</td>';
    echo '<td width="100" style="word-wrap:break-word;">',$str[1],'</td>';
    echo '<td width="200" style="word-wrap:break-word;">',$str[2],'</td>';
    echo '<td width="100" style="word-wrap:break-word;">',$str[3],'</td>';
    echo '<td width="200" style="word-wrap:break-word;">',$str[4],'</td>';
    echo '</tr>';
 
    // var_dump($str);
    // // ファイルを読み込んだ変数を出力
    // echo $txt.'<br>';

}
// echo '</tr>';
// fcloseでファイルを閉じる
fclose($fp);
?>
</table>


<br>
<a href="index2.php">アンケート調査に戻る</a>
</div>
<br>
<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
<br>
</body>
</html>