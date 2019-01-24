<?php
// echo "ABC"; //echo HTMLで表示
echo date("Y-m-d H:i:s");
echo "<br>";
echo date("Ymd His");
echo "<br>";
echo date("Y年m月d日 H時i分s秒");


$d = date("s"); //秒だけ取得
if( $d >= 30 ){
echo '<p style="color:red;">30秒以上</p>';
}else{
echo '<p style="color:blue;">29秒以下</p>';
}
echo '<p>現在：'.$d.'秒</p>';




// phpinfo();

?>