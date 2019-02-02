<?php
$ID = $_GET["ID"];
// echo $id;

//--------------------------------------------
// 以下、select.phpからコピーしてきました。
//--------------------------------------------
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE ID=:ID");
$stmt->bindValue(":ID",$ID, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    $row = $stmt->fetch();
    // var_dump($row);
}
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
?>

<!-- 以下、index.phpからコピーしてきました。 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<h1>好きな本を並べておくサイト</h1><br>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">

    <a href="bm_update_view.php">結果の一覧</a>
    </div>
  </nav>
</header>


<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>本の名前： <input type="text" name="Book_name" value="<?php echo $row["Book_name"];?>"> </label><br>
     <label>本のURL： <input type="text" name="Book_URL" value="<?php echo $row["Book_URL"];?>">   </label><br>
     <label><textArea name="Comment" rows="4" cols="40"><?php echo $row["Comment"];?></textArea></label><br>
     <input type="hidden" name="ID" value="<?php echo $ID ?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
