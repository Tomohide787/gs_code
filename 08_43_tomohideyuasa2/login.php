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
<h1>Gs 芸能人を探せアプリに、PHP参戦編</h1><br>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <a href="index2.html">TOP PAGE</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ログイン管理</legend>
     <label>ニックネーム：<input type="text" name="name"></label><br>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインPW：<input type="text" name="lpw"></label><br>
     <label>管理者：<input type="text" name="kanri_flg"></label><br><br>     
     <input class="form-control3" type="submit" value="送 信">
     <input class="form-control3" type="button" onClick="location.href='select2.php'" value="コメントリスト">
     <input class="form-control3" type="button" onClick="location.href='select3.php'" value="ユーザー管理画面">
    </fieldset>
  </div>
</form>

<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
</body>
</html>


