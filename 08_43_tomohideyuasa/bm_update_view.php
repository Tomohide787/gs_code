<?php

include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<tr><td>".$result["ID"]."</td><td>".$result["Book_name"]."</td><td>".$result["Book_URL"]."</td><td>".$result["Comment"]."</td><td>".$result["indate"];
        $view .= '<td><a href="bm_update.php?ID='.$result["ID"].'">';
        $view .= '[編集]</a></td>';
        $view .= '  ';
        $view .= '<td><a href="delete.php?ID='.$result["ID"].'">';
        $view .= '[削除]';
        $view .= '</a></td>';
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
  background-color: #ffc0cb;
  margin: 0px auto;
  line-height: 120%;
}

table.ex_table th {
  border: 1px solid #222;
  padding: 3px;
  background-color: #d8bfd8;
}
table.ex_table td {
  border: 1px solid #222;
  padding: 3px;
}
</style>
<body>

<h1>好きな本を並べておくサイト</h1><br>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <a href="index.php">TOP PAGE</a>
    <a href="bm_update_view.php">結果の一覧</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<div class="wrapper0">
  <div class="main5">
        <table class="ex_table" align="center" border="1" width="900">
                <!-- border="1"  bgcolor="#ffc0cb"-->
                <tr>
                  <th width="50">ID</th>
                  <th width="200">本の名前</th>
                  <th width="200">本のURL</th>
                  <th width="200">書籍コメント</th>
                  <th width="200">投稿時間</th>
                  <th width="200">編集</th>
                  <th width="200">削除</th>
                </tr>
                <?=$view?>
                </table>
    <!-- ?php echo $view? が普通 -->
    </div>
</div>


<!-- Main[End] -->
<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
</body>
</html>
