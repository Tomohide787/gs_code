<?php
//1.  DB接続します
include("funcs2.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  sqlerror($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php


  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){    //必要な行数まで回ってくれる、「.=」とは上書きせずに、プラスイコールみたいな、消さずに追加していく感じ
    $view .= "<tr><td>".$result["ID"]."</td><td>".$result["Book_name"]."</td><td>".$result["Book_URL"]."</td><td>".$result["Comment"]."</td><td>".$result["Lat"]."</td><td>".$result["Lon"]."</td><td>".$result["indate"]."</td></tr>";
    // $view .= '<tr><td>'.$result["id"]."</td><td>".$result["name"]."</td></tr>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Map&amp;PHP</title>
<!-- <link rel="stylesheet" href="css/reset.css"> -->
<link rel="stylesheet" href="css/style.css">
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<style>
table.ex_table {
  border-collapse: collapse;
  border: 0;
  background-color: #ffc0cb;
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
 <h1>Gs 芸能人を探せアプリに、PHP参戦編</h1>

<!-- <body id="main"> -->
<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index2.php">データ登録</a>
      </div>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <div> -->

<div class="wrapper0">
  <div class="main5">
    <div class="container jumbotron">
                <table class="ex_table" align="center"  width="900">
                <!-- border="1"  bgcolor="#ffc0cb"-->
                <tr>
                  <th width="50">ID</th>
                  <th width="200">あなたの名前</th>
                  <th width="200">気になるURL</th>
                  <th width="200">書籍コメント</th>
                  <th width="100">緯度</th>
                  <th width="100">経度</th>
                  <th width="200">投稿時間</th>
                </tr>
                <?=$view?>
                </table>
    </div>
  </div>
</div>

<br>


<a href="index2.html">Homeページに戻る</a>

<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
</body>
</html>

<!-- tr　行を示す。 tdは -->