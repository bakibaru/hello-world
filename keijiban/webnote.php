<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

session_start(); // 1

$name = (string)filter_input(INPUT_POST, 'name');
$comment = (string)filter_input(INPUT_POST, 'comment');
$token = (string)filter_input(INPUT_POST, 'token');

$fp = fopen('data.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    flock($fp, LOCK_EX);
    fputcsv($fp, [$_POST['name'], $_POST['comment']]);
    rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp))
{
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="webnote.css" media="all">
<title>掲示板</title>
</head>
<body>
<h1>掲示板</h1>
<section>
    <h2>新規投稿</h2>
    <form method="post" action="">
        <div class="name"><span class="label">お名前:</span><input type="text" name="name" value=""></div>
        <div class="honbun"><span class="label">本文:</span><textarea name="comment" cols="30" rows="3" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea></div>
        <input type="submit" value="投稿">
    </form>
</section>
<section class="toukou">
    <h2>投稿一覧</h2>
<?php if (!empty($rows)): ?>
    <ul>
<?php foreach ($rows as $row): ?>
       <li><?=$row[1]?> (<?=$row[0]?>)</li>
<?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>投稿はまだありません</p>
<?php endif; ?>
</section>
</body>
</html>
