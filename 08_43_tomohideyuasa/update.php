<?php
//--------------------------------------------
// 以下、insert.phpからコピーしてきました。
//--------------------------------------------
//1.POSTでParamを取得
$Book_name = $_POST["Book_name"];
$Book_URL  = $_POST["Book_URL"];
$Comment   = $_POST["Comment"];
$ID        = $_POST["ID"];

//2.DB接続など
include "funcs.php";
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$sql = "UPDATE gs_bm_table SET Book_name=:Book_name, Book_URL=:Book_URL, Comment=:Comment WHERE ID=:ID";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':Book_name', $Book_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Book_URL',  $Book_URL,  PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Comment',   $Comment,   PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':ID',        $ID,        PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: bm_update_view.php");
    exit;
}



?>
