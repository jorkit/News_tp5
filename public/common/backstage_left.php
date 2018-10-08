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
        .content{
            width: 13%;
            height: 895px;
            background: rgb(238,238,238);
            float:left;
            /*margin-left: 1px;*/
            /*margin-right: 1px;*/
            border-right: 1px solid black;
            border-left: 1px solid black;
            border-bottom: 1px solid black;
        }
        .left-top{
            width: 100%;
            height: 50px;
            background: #8B8B7A;
            line-height: 50px;
            font-size: 20px;
            padding-left: 25px;
            color: black;
        }
        .left-top a{
            color: black;
            text-decoration: none;
        }
        .left-type ul li{
            height:50px;
            line-height: 30px;
            font-size: 15px;
            /*background: #46b8da;*/
        }
        .active{
            color: black;
            background: #DBDBDB;
            border-bottom: 1px solid black;
            border-top: 1px solid black;
        }
        .left-type a{
            font-size: 15px;
            color: black;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="left-top">
        <span class="glyphicon glyphicon-home" aria-hidden="true" ></span><a href="../backstage/home.php">&nbsp&nbsp&nbsp首页</a>
    </div>
    <div class="left-type">
        <ul class="nav nav-stacked">
            <li role="presentation" class="active">
                <a href="../backstage/newsList.php">
                    <span style="margin-right: 10px;"></span>
                    <span class="glyphicon glyphicon-globe" aria-hidden="true" style="margin-right: 18px"></span>
                    资讯管理
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-top: 5px;margin-right: 5px;float: right"></span>
                </a>
            </li>
            <li role="presentation" class="active">
                <a href="../backstage/typeList.php">
                    <span style="margin-right: 10px;"></span>
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true" style="margin-right: 18px"></span>
                    类型管理
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-top: 5px;margin-right: 5px;float: right"></span>
                </a>
            </li>
            <li role="presentation" class="active">
                <a href="../backstage/userList.php">
                    <span style="margin-right: 10px;"></span>
                    <span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-right: 18px"></span>
                    用户管理
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-top: 5px;margin-right: 5px;float: right"></span>
                </a>
            </li>
            <li role="presentation" class="active">
                <a href="../backstage/editorList.php">
                    <span style="margin-right: 10px;"></span>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 18px"></span>
                    编辑管理
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-top: 5px;margin-right: 5px;float: right"></span>
                </a>
            </li>
            <li role="presentation" class="active">
                <a href="../backstage/authority.php">
                    <span style="margin-right: 10px;"></span>
                    <span class="glyphicon glyphicon-cog" aria-hidden="true" style="margin-right: 18px"></span>
                    授权管理
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="margin-top: 5px;margin-right: 5px;float: right"></span>
                </a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>