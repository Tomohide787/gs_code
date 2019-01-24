<html>
<head>
<meta charset="utf-8">
<title>GET練習</title>
</head>
<body>

<!-- formのタグでくくる  -->
<!-- name　の中身だけが、送られる -->
<!-- 送信方法はget か postの２種類しかない -->
<!-- ただ基本的には、全てpostで送る （getだと、URLに内容が見れてしまうから）--> 


<form action="get_confirm.php" method="get">
	お名前: <input type="text" name="name">
	EMAIL: <input type="text" name="mail">
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>