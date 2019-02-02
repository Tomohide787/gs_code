<?php
$ID=$_GET["ID"];
// echo $id;

//--------------------------------------------
// 以下、insert.phpからコピーしてきました。
//--------------------------------------------
// /2. DB接続します

include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "DELETE FROM gs_bm_table WHERE ID=:ID";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ID', $ID, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: bm_update_view.php");
    exit;
}
