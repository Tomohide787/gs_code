<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$Book_name = $_POST["Book_name"];
$Book_URL  = $_POST["Book_URL"];
$Comment   = $_POST["Comment"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(Book_name,Book_URL,Comment,indate)VALUES(:Book_name,:Book_URL,:Comment,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':Book_name', $Book_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Book_URL',  $Book_URL,  PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Comment',   $Comment,   PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
}




// Route::post('indert.php','funcs@insert.php');
