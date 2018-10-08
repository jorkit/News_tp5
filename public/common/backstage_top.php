<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .main2{
            /*margin-bottom: 60px;*/
        }
        .nav-menu{
            height: 50px;
            width: 100%;
            /*max-width:1850px;*/
            /*margin: 0 auto;*/
            background:#2E2E2E;
            border-bottom: 1px solid black;
        }
        .nav-menu-left{
            height: 50px;
            width: 400px;
            padding-left: 20px;
            /*background-color:yellow;*/
            float: left;
        }
        .nav-menu-left span{
            font-size: 23px;
            line-height: 50px;
            color: white;
        }
        .nav-menu-right{
            height: 50px;
            width: 400px;
            padding-left: 20px;
            /*background-color:lightgreen;*/
            float: right;
        }
        .nav-menu-right img{
            height: 45px;
            width: 45px;
            margin-top: 2px;
            /*margin-right: 20px;*/
            float: right;
        }
        .nav-menu-right span{
            margin-left: 10px;
            font-size: 18px;
            line-height: 50px;
            color: white;
            float: right;
        }
        .nav-menu-right span>a{
            color:white;
        }
    </style>
</head>
<body>
<div class="main2">
    <div class="nav-menu">
        <div class="nav-menu-left">
            <span>急速快讯&nbsp&nbspv1.0</span>
        </div>
        <div class="nav-menu-right">
<!--            <span style="margin: 0 30px 0 50px">前台首页</span>-->
            <span style="margin-left: 10px;margin-right: 150px"><a href="../frontEnd/homePage.php">退出</a></span>
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
            <span>&nbsp<?php echo $_SESSION["account"] ?>&nbsp&nbsp</span>
            <img src="<?php if($_SESSION["head_pic"] == NULL)echo "../user/uploads/默认头像.jpg"; else echo $_SESSION["head_pic"] ?>" class="img-circle">
        </div>
    </div>
</div>
</body>
</html>