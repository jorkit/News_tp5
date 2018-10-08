<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户信息</title>
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/userInfo.css">
</head>
<body>
<?php
include dirname(__FILE__) . "/../common/login_top.php";
$user_id = $_GET["id"];
include_once dirname(__FILE__) . "/../common/db.php";
$res = mysqli_query($con,"select * from user where id=$user_id");
mysqli_close($con);
if($res){
    $row = mysqli_fetch_array($res,1);
}
else{
    ?>
    <script type="text/javascript">
        alert("信息读取失败！")
    </script>
    <?php header("Refresh: 0.01; url=homePage.php");
    die;
}
?>
<div class="main2">
    <div class="content">
        <div class="content-left">
            <ul class="nav .nav-stacked">
                <li role="presentation" class="active ">个人中心</li>
                <li role="presentation" ><a href="#"><?php echo $row["nickname"]?>的信息</a></li>
            </ul>
        </div>
        <div class="content-right">
            <div class="content-right-top">
                <b style="width: 30px;display:inline-block"></b>
                <?php echo $row["nickname"]?>的信息
            </div>
            <div class="info-list1">
                <div class="info-headphoto">
                    <img src="<?php if(empty($row["head_pic"]))echo "../user/uploads/默认头像.jpg"; else echo $row["head_pic"] ?>" style="height: 180px;width: 180px;" class="img-circle" >
                </div>
            </div>
            <div class="info-line">
                <div class="info-list2">
                    <div class="info-user">
                        <label class="info-lab" >用户名：</label><div class="info-user-content"><?php echo $row["account"]?></div>
                    </div>
                    <div class="info-user">
                        <label class="info-lab" >昵称：</label><div class="info-user-content"><?php echo $row["nickname"]?></div>
                    </div>
                    <div class="info-user">
                        <label class="info-lab" >年龄：</label><div class="info-user-content"><?php echo $row["age"]?></div>
                    </div>
                    <div class="info-user">
                        <label class="info-lab" >性别：</label><div class="info-user-content"><?php echo ($row["sex"]) == 1 ? "男" :  "女" ?></div>
                    </div>
                    <div class="info-user">
                        <label class="info-lab" >个性签名：</label><div class="info-user-content"><?php echo $row["signature"]?></div>
                    </div>
                </div>
                <div class="info-list3">
                    <div>&nbsp</div>
                    <div>&nbsp</div>
                    <button type="button" class="btn btn-default" onclick="window.location.href='detail.php?news_id=<?php echo $_GET["news_id"]?>&pageindex=<?php echo $_GET["pageindex"]?>'" style="width: 82px;height: 32px">返回</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include dirname(__FILE__) . "/../common/footer.php";
?>
</body>
</html>