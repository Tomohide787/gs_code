<?php
//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];
$lat = $_POST["lat"];
$lon= $_POST["lon"];
// $age = $_POST["age"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(name,email,naiyou,indate,lat,lon)VALUES(:name,:email,:naiyou,sysdate(),:lat,:lon)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lat',    $lat,    PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lon',    $lon,    PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: index2.php");
    exit;
}
