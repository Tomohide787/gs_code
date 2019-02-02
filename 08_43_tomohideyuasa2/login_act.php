<?php
//1. POSTデータ取得
$name  = $_POST["name"];
$lid   = $_POST["lid"];
$lpw   = $_POST["lpw"];
$kanri_flg   = $_POST["kanri_flg"];


//2. DB接続します
include "funcs3.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,indate)VALUES(:name,:lid,:lpw,:kanri_flg,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',  $lid,  PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',  $lpw,  PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg',  $kanri_flg,  PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index2.html");
    exit;
}

// Route::post('indert.php','funcs@insert.php');
