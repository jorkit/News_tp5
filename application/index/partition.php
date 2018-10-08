
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>内容分区</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/partition.css">
</head>
<body>
<?php
    include dirname(__FILE__) . "/../common/homePage_top.php";
    $type_id = $_GET["type_id"];
    include_once dirname(__FILE__) . "/../common/partition_paging.php";
    include_once dirname(__FILE__) . "/../common/db.php";
    $res_type = mysqli_query($con,"select type from newstype where type_id = $type_id");
    $countRes = mysqli_query($con,"select count(*) from news where type_id = $type_id");
    $res_left = mysqli_query($con,"select * from news where type_id = $type_id limit $offset,$pagesize");
    $res_right = mysqli_query($con,"select * from news where type_id = $type_id order by score desc limit $offset,$pagesize");
    mysqli_close($con);
    if(!$res_type || !$countRes || !$res_left || !$res_right){
        die("网站维护中，请下次光临！");
    }
    $row = mysqli_fetch_array($countRes);
    $count = $row[0];
    $row_type = mysqli_fetch_array($res_type,MYSQLI_ASSOC)
    ?>
    <div class="content">
        <div class="type-left">
            <!--            <div class="type-top ">-->
            <!--                    <span class="glyphicon glyphicon-home" aria-hidden="true"><a href="layout-List.php">首页&nbsp</a></span>-->
            <!--                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true">&nbsp</span>-->
            <!--                    <span class="glyphicon glyphicon-blackboard" aria-hidden="true"><a href="layout-tv.php">电视剧</a></span>-->
            <!---->
            <!--            </div>-->
            <div class="content2">
                <?php
                while($row_news = mysqli_fetch_array($res_left,MYSQLI_ASSOC)){
                    ?>
                    <div class="spread-module">
                        <a href="detail.php?news_id=<?php echo $row_news["news_id"]?>">
                            <img src="../news/<?php echo $row_news["pic"]?>" style="width: 160px;height: 224px;border: 2px solid white;border-radius:10px;">
                            <div class="title">
                                <p>《<?php echo $row_news["title"]?>》</p>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="type-right">
            <div class="type-right-list">
                <div class="type-right-top">
                    <span><?php echo $row_type["type"]?></span>
                    <span class="type-right-top-1">排行</span>
                </div>
                <div class="type-right-content">
                    <ul>
                        <?php
                        $num = 10;
                        while($num > 0){
                            $row_news = mysqli_fetch_array($res_right,MYSQLI_ASSOC)
                            ?>
                            <li><a href="detail.php?news_id=<?php echo $row_news["news_id"]?>"><?php echo $row_news["title"]?></a></li>
                            <?php
                            $num -- ;
                        } ?>
                        <!--                        <li><a class="btn btn-default" style=" width: 200px" href="partition.php?type_id=--><?php //echo $row_type[""]?><!--">查看更多<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <ul class="pager">
            <li><a href="partition.php?type_id=<?php echo $type_id ?>&pageindex=<?php echo $pageindex-1 < 0 ? 0 : $pageindex-1  ?>">上一页</a></li>
            <li>共<?php echo ceil($count/$pagesize)?>页</li>
            <li><a href="partition.php?type_id=<?php echo $type_id ?>&pageindex=<?php echo $pageindex+1>=ceil($count/$pagesize) ? ceil($count/$pagesize)-1:$pageindex+1 ?>">下一页</a></li>
        </ul>
    </nav>
<?php
include dirname(__FILE__) . "/../common/footer.php";
?>
</body>
</html>
