<?php
// $array = array("A", "B", "C", "D");
// var_dump($array);

// $str = "PHP5_PHP6_PHP7_PHP5";

// // 文字を入れ替える
// echo str_replace("PHP5", "PHP5.5", $str);

$s = "A,B,C,D,E,F";
$str = explode(",", $s);
var_dump($str);

?>