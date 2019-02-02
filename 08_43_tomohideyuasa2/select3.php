<?php
//1.  DB接続します
include("funcs3.php");
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sqlerror($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){    //必要な行数まで回ってくれる、「.=」とは上書きせずに、プラスイコールみたいな、消さずに追加していく感じ
    $view .= "<tr><td>".$result["id"]."</td><td>".$result["name"]."</td><td>".$result["lid"]."</td><td>".$result["lpw"]."</td><td>".$result["kanri_flg"]."</td><td>".$result["life_flg"]."</td><td>".$result["indate"]."</td></tr>";
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
<div class="wrapper0">
  <div class="main5">
    <div class="container jumbotron">
                <table class="ex_table" align="center"  width="900">
                <tr>
                  <th width="50">ID</th>
                  <th width="200">Name</th>
                  <th width="200">Login ID</th>
                  <th width="200">Login PW</th>
                  <th width="100">管理者権限</th>
                  <th width="150">管理者フラグ</th>
                  <th width="200">ログイン時間</th>
                </tr>
                <?=$view?>
                </table>
    </div>
  </div>
</div>
<br>
<a href="login.php">Login画面に戻る</a>
<a href="index2.html">Homeページに戻る</a>

<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
</body>
</html>

<!-- tr　行を示す。 tdは -->