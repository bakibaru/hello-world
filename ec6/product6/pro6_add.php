<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EC Shop6</title>
<link rel="shortcut icon" href="img6/favicon.ico">
</head>
<body>

商品追加<br />
<br />
<form method="post" action="pro6_add_check.php" enctype="multipart/form-data">
商品名<br />
<input type="text" name="name" style="width:220px"><br />
価格<br />
<input type="price" name="price" style="width:70px"><br />
<br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:500px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>
