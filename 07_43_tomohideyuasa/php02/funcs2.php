<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=bookmark-db;charset=utf8;host=localhost','root','');
        return $pdo;   
    } catch (PDOException $e) {
        exit('DB-Connection-Errorです:'.$e->getMessage());
      }
}

function sqlerror($stmt){
    $error = $stmt->errorInfo();
    exit("ERROR　SQLです:".$error[2]);
}

function redirect($page){
    header("Location: ".$page);
    exit;
}