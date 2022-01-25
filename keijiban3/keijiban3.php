<?php

$dataFile = 'datafile.csv';

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

if (isset($_POST["send_message"]))
{
      $message = trim($_POST['message']);
      $user = trim($_POST['user_name']);

    if (!empty($message))
    {
        if (empty($user))
        {
           $user = "名無し";
        }

        $postDate = date('Y-m-d H:i:s');
        $newData = $message." / ".$user." / ".$postDate."\n";
        $fp = fopen($dataFile, 'a');
        fwrite($fp, $newData);
        fclose($fp);
    }
}

$post_list = file($dataFile, FILE_IGNORE_NEW_LINES);
$post_list = array_reverse($post_list);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP掲示板</title>
</head>
<body>

<h1>PHP掲示板</h1>

<form method="post" action="">
    名前:<input type="text" name="user_name">
    内容:<input type="text" name="message">
    <input type="submit" name="send_message" value="投稿">
</form>

<h2>投稿一覧</h2>
<ul>
<?php if (!empty($post_list)){ ?>
    <?php foreach ($post_list as $post) { ?>
    <li><?php echo h($post); ?></li>
  <?php } ?>
<?php }else{ ?>
    <li>まだ投稿はありません。</li>
<?php } ?>
<ul>

</body>
</html>
