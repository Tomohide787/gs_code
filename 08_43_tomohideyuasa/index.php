<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>好きな本を並べておくサイト</title>
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
    <a href="index.php">TOP PAGE</a>
    <a href="bm_update_view.php">結果の一覧</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>好きな本を並べておくサイト</legend>
     <label>本の名前：<input type="text" name="Book_name"></label><br>
     <label>本のURL：<input type="text" name="Book_URL"></label><br>
     <p>本のコメント</p>
     <label><textArea name="Comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


<?php
// $url = 'http://iss.ndl.go.jp/api/opensearch?title="SMAP"';
// $xml = new SimpleXMLElement($url, 0, true);
// echo $xml->channel->item[0]->children('dc', true)->title;
// echo $xml->channel->item[0]->children('dc', true)->creator;
?>

<!-- Main[End] -->
<!-- 
<form method="post" action="insert.php" >
<input type="text" name="book" size="20"/>
<input type="submit" value="Submit"/>
</form> -->
<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
</body>
</html>


