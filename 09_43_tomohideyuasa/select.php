<?php
session_start();
include "funcs.php";


//ブロックをかけるためのプログラム
sessChk();

$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';

    // if($_SESSION["kanri_flg"]=="1"){
    //  $view .= '<a href="delete.php?id=' . $result["id"] . '">';
    //  $view .= "[☓]";
    //  $view .= '</a>';
    // }

    if($_SESSION["kanri_flg"]=="1"){
    $view .= "<tr><td>".$result["id"]."</td><td>".$result["name"]."</td><td>".$result["email"]."</td><td>".$result["naiyou"]."</td><td>".$result["lat"]."</td><td>".$result["lon"]."</td><td>".$result["indate"]."</td>";
    $view .= '<td><a href="detail.php?id='.$result["id"].'">';
    $view .= '[更新]</a></td>';
    $view .= '  ';
    $view .= '<td><a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a></td>';
    }else{
    $view .= "<tr><td>".$result["id"]."</td><td>".$result["name"]."</td><td>".$result["email"]."</td><td>".$result["naiyou"]."</td><td>".$result["lat"]."</td><td>".$result["lon"]."</td><td>".$result["indate"]."</td>";
    $view .= '<td>[---]</td>';
    $view .= '<td>[---]</td>';    
}
}
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>

<style>
table.ex_table {
  border-collapse: collapse;
  border: 0;
  background-color: #4169e1;
}

table.ex_table th {
  border: 1px solid #222;
  padding: 3px;
  background-color: #191970;
}
table.ex_table td {
  border: 1px solid #222;
  padding: 3px;
}
</style>

<body>
    <div class="login">
      ようこそ、「<?php echo $_SESSION["name"]; ?>」さん / 
      <a class="navbar-brand" href="index2.php">Home</a> /
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
<br>
<h1>保存したメモ一覧<h1>
<div class="display5">

        <table class="ex_table" border="1" align="center"  width="980">
                <tr>
                  <th width="50">ID</th>
                  <th width="200">メモのタイトル</th>
                  <th width="200">気になるURL</th>
                  <th width="200">自由なコメント</th>
                  <th width="100">緯度</th>
                  <th width="100">経度</th>
                  <th width="250">ログイン時間</th>
                  <th width="80">更新</th>
                  <th width="80">削除</th>
                </tr>
                <?=$view?>
        </table>
</div>


<br>
<h1>今までのGsで作ってきた作品集<h1>
<h2>Gs 芸能人を探せアプリに、PHP参戦編</h2><br>

<div class="display">
サンプルです。<br>
作成中・・・・・・・・・

<br>
</div>
<br>
     <p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
     <br>
</body>
</html>
