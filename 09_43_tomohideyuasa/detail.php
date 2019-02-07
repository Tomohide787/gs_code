<?php
session_start();
$id = $_GET["id"];
include "funcs.php";

//ブロックをかけるためのプログラム
sessChk();

$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<div class="login">
      ＜＝更新画面処理＝＞　　　　　
      ようこそ、「<?php echo $_SESSION["name"]; ?>」さん / 
      <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
<br>
<h1>更新内容を入力ください</h1><br>
<form method="post" action="update.php">
<h4>
   <fieldset>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
     <label>緯度：<input type="text" name="lat" value="<?=$row["lat"]?>"></label><br>
     <label>経度：<input type="text" name="lon" value="<?=$row["lon"]?>"></label><br>
     <input type="hidden" name="id" value="<?php echo $id ?>"><br>
     <input class="form-control3" type="submit" value="送信">
    </fieldset>
</h4>
</form>
<!-- Main[End] -->


</body>
</html>
