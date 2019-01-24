<html>
<head>
<meta charset="utf-8">
<title>GSアカデミー　満足度調査</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>GSアカデミー　満足度調査</h1>
<br>
<div class="contact">

<form action="write2.php" method="post">
	お名前: <input type="text" name="name"><br>
	<hr class="hr-text">

	EMAIL: <input type="text" name="mail"><br>
	<hr class="hr-text">

	五段階評価: 
	<input type="radio" name="select" value="(5)Very good"> とても満足
	<input type="radio" name="select" value="(4)Good"> 満足
	<input type="radio" name="select" value="(3)soso"> 普通
	<input type="radio" name="select" value="(2)Unsatisfied"> 不満足
	<input type="radio" name="select" value="(1)Quit unsatisfied"> かなり不満足
	<hr class="hr-text">

	自由な感想: <textarea rows="10" cols="60" name="memo"></textarea>
	<hr class="hr-text">

	じゃんけん：
	<input type="radio" name="select2" value="1"> ぐー
	<input type="radio" name="select2" value="2"> チョキ
	<input type="radio" name="select2" value="3"> パー
	<br><br>
	<input class="form-control1" type="submit" value="送信">
</form>
</div>

<br>
<br>
<p>Copyrights 2019 Tomohide YUASA All RIghts Reserved.</p>
<br>
</body>
</html>
