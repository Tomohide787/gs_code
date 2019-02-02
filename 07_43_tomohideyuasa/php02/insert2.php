<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET,"name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ　空っぽでもエラーにならない
$Book_name  = $_POST["Book_name"];
$Book_URL   = $_POST["Book_URL"];
$Comment    = $_POST["Comment"];
$Lat        = $_POST["Lat"];
$Lon        = $_POST["Lon"];


//2. DB接続します
// try {
//   $pdo = new PDO('mysql:dbname=********;charset=utf8;host=localhost(サクラのなまえに変える)','******（サクラのID）','******（サクラのPW）');
// } catch (PDOException $e) { ログインとかができない場合のエラーメッセージを出すため
//   exit('*********メッセージ*******:'.$e->getMessage());
// }
include("funcs2.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(Book_name, Book_URL, Comment, indate, Lat, Lon)VALUES(:Book_name,:Book_URL,:Comment, sysdate(), :Lat, :Lon);");
$stmt->bindValue(':Book_name',  $Book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)binValue：安全な内容に変える（無効化する）
$stmt->bindValue(':Book_URL',   $Book_URL,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Comment',    $Comment,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 文字場合STR
$stmt->bindValue(':Lat',        $Lat,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 文字場合STR
$stmt->bindValue(':Lon',        $Lon,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 文字場合STR
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
 sqlerror($stmt);
}else{
  // exit(エラーが見たい場合);
  //５．index.phpへリダイレクト ＝ 処理が終わったら自動的にページに遷移する
 redirect("http://localhost/php02/07_43_tomohideyuasa/php02/index2.html");
//  redirect("insert.php");
}
?>
