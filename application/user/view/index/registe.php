<?php
include dirname(__FILE__) . "/../common/login_top.php";
?>
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
    <link rel="stylesheet" href="../css/registe.css">
    <script language="javascript" type="text/javascript">
        function isAgree(){
            var is = document.getElementById("agreement");
            var bt = document.getElementById("form_submit");
            if(!is.checked){
                bt.disabled=true;
            }else{
                bt.disabled=false;
            }
        }
    </script>
    <script type="text/javascript"src="../js/checkregiste.js"></script>
</head>
<body>
<div class="main2">
    <div class="title">
        <div class="title-line"></div>
        <span class="title-name">注册</span>
        <div class="title-line2"></div>
    </div>
    <div  class="content">
        <form action="../user/saveRegiste.php" method="post" name="form1">
            <div class="group">
                <input type="text" value class="form-control" id="username" name="saccount" onblur="ckname()" placeholder="你的用户名/账号" >
                <div id="domename" class="dome" ></div>
            </div>
            <div class="group">
                <input type="password" value class="form-control" id="password" name="spassword" onblur="ckpass()" placeholder="密码">
                <div id="domepass" class="dome" ></div>
            </div>
            <div class="group">
                <input type="password" value class="form-control" id="password2" name="passwordcheck" onblur="ckpassagain()" placeholder="确认密码" >
                <div id="domepass2" class="dome" ></div>
            </div>
            <div class="check-box">
                <span><input id="agreement" type="checkbox" onclick="isAgree()"  checked="checked" class="inputCheck" ><label for="agreement"></label>我已阅读并同意<a>《急速快讯用户使用协议》</a>和 <a href="">《急速快讯账户中心规范》</a></span>
                <div class="form-submit">
                    <button id="form_submit" type="button" class="btn btn-primary" onclick="return checklogin()" style="height: 50px;width: 550px; line-height: 40px;">注册</button>
                </div>
        </form>
    </div>
</div>
<?php
include dirname(__FILE__)."/../common/footer.php";
?>
</body>
</html>