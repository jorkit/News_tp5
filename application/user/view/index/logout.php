<!doctype html>
<html lang="`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jumping.css">
</head>
<body class="bg">
<div class="turn">
    <div class="turn-top">
        <span>急速快讯</span>
    </div>
    <div class="darkwrap"></div>
    <div class="content">
        <?php
        session_start();
        session_destroy();
        echo "已登出，可以安全关闭浏览器"
        ?>
        <br/>
        <a href="login.php" style="padding-left: 50px">重新登陆</a>
    </div>
</div>
</body>
</html>