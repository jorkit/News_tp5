
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/homePage_top.css">
</head>
<body>
<div class="main">
    <div class="navbar navbar-fixed-top">
        <div class="top">
            <div class="nav">
                <div class="nav-glass">
                </div>
                <div class="nav-menu ">
                    <div class="nav-menu-left">
                        <ul>
                            <li>
                                <a href="/static/homePage.php">
                                    <img src="/static/background/LOGO.png" style="margin: 0 5px 10px 0">
                                </a>
                                <a href="/">起始站</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-menu-right">
                        <ul>
                                  {if condition="$session_user_id != null"}
                                <li>
                                    <a href="../frontEnd/logout.php">下车</a>
                                </li>
                                {switch name="$session_role_id"}
                                    {case value="1"}
                                        <li><a href='../backstage/home.php'>&nbsp管理</a></li>
                                    {/case}
                                    {case value="2"}
                                        <li><a href="../backstage/home.php">&nbsp工作</a></li>
                                    {/case}
                                    {case value="3"}{/case}
                                    {default /}
                                {/switch}
                                <li>
                                    <a href="../frontEnd/userInfo.php">{$session_nickname}</a>
                                </li>
                            {/if}
                            {if condition="$session_user_id == null"}         
                                <li>
                                    <a href="../frontEnd/login.php">上车</a>
                                </li>
                            {/if}
                            <li>
                                {if condition="$session_user_id == null"}
                                    <a href="../frontEnd/login.php"><img style="width: 38px;height: 38px;" class="img-circle" src="
                                    /static/user_uploads/默认头像.jpg"></a>
                                {else/}
                                {if condition="$session_head_pic != null"}
                                    <a href="../frontEnd/userInfo.php"><img style="width: 35px;height: 35px;" class="img-circle" src="{session_head_pic}"</a>
                                {else /}
                                    <a href="../frontEnd/userInfo.php"><img style="width: 35px;height: 35px;" class="img-circle" src="
                                    /static/user_uploads/默认头像.jpg"></a>
                                {/if}
                                {/if}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav2">
            <div class="nav2-menu">
                <div class="nav2-menu-content">
                    <ul>
                        <li>
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <a href="/">首页</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                            <a href="../frontEnd/partition.php?type_id=1">电视剧</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            <a href="../frontEnd/partition.php?type_id=2">电影</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
                            <a href="../frontEnd/partition.php?type_id=3">动漫</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            <a href="../frontEnd/partition.php?type_id=4">小说</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                            <a href="../frontEnd/partition.php?type_id=5">综艺</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>