<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title;?></title>
</head>
<body>
<nav>
    <ul>
        <li><a href="<?=strtok($_SERVER['REQUEST_URI'], '?');?>">Forside</a></li>
        <li><a href="?page=Cheesecake">Cheesecake</a></li>
        <li><a href="?page=Feta">Feta</a></li>
    </ul>
</nav>
    <h1><?=$title;?></h1>
    <?=$content;?>

</body>
</html>

