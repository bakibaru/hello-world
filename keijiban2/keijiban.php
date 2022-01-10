<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="keijiban.css" media="all">
<title>オリジナル掲示板</title>
</head>
<body>

<h1>オリジナル掲示板</h1>

<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<input type="text" name="personal_name">
<br />
<br />
<textarea name="contents" rows="10" cols="50"></textarea>
<br />
<br />
<input type="submit" name="button1" value="投稿する">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
      writeData();
}

readData();

function readData()
{
    $keijiban_file = 'data2.csv';

    $fp = fopen('data2.csv', 'a+b');

    if ($fp)
    {
        if (flock($fp, LOCK_SH))
        {
            while (!feof($fp))
            {
                $buffer = fgets($fp);
                print($buffer);
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロック失敗');
        }
    }

    fclose($fp);
}

function writeData()
{
    $personal_name = $_POST['personal_name'];
    $contents = $_POST['contents'];
    $contents = nl2br($contents);

    $data = "<hr>\r\n";
    $data = $data."<p>投稿者:".$personal_name."</p>\r\n";
    $data = $data."<p>内容:</p>\r\n";
    $data = $data."<p>".$contents."</p>\r\n";

    $keijiban_file = 'data2.csv';

    $fp = fopen('data2.csv', 'a+b');

    if ($fp)
    {
        if (flock($fp, LOCK_EX))
        {
            if (fwrite ($fp, $data) === FALSE)
            {
                print('ファイル送信失敗');
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロック失敗');
        }
    }

    fclose($fp);
}

?>

</body>
</html>
