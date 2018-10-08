
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>资讯详情</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/detail.css">
</head>
<body>
<?php
    include dirname(__FILE__) . "/../common/homePage_top.php";
    include_once dirname(__FILE__) . "/../common/comment_paging.php";
    $news_id = $_GET["news_id"];
    $_SESSION["news_id"] = $news_id;
    include_once dirname(__FILE__) . "/../common/db.php";
    $res = mysqli_query($con,"select * from news where news_id = $news_id");
    //按评分排名
    $res_else =  mysqli_query($con,"select * from news order by score desc");
    //获取评论/数
    $res_comment = mysqli_query($con,"select * from comment join user on comment.user_id=user.id  where news_id=$news_id order by time desc limit $offset,$pagesize");
    $countRes = mysqli_query($con,"select count(*) from comment where news_id = $news_id");
    mysqli_close($con);
    $row_count = mysqli_fetch_array($countRes);
    $count = $row_count[0];
    $floor = $count - $pageindex * $pagesize;
    $page = ceil($count/$pagesize);
    $num = 0;
    if($res && $res_else && $res_comment){
        $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
    }
    else{
        ?>
        <script type="text/javascript">
            alert("信息获取失败!")
        </script>
        <?php header("Refresh: 0.01; url=homePage.php");
    }
    ?>
    <div class="content-main">
        <div class="content-intro">
            <div class="content-intro-left">
                <img src="../news/<?php echo $row["pic"]?>" width="100%" height="100%">
            </div>
            <div class="content-intro-right">
                <div class="content-intro-right-top">
                    <div class="news-name">
                        <?php echo $row["title"]?>
                    </div>
                </div>
                <div class="content-intro-right-Introduction">
                    <div class="intro-list">
                        <div style="margin-bottom: 8px"><em style="font-style: normal; color: #999;">国家：</em><?php echo $row["country"]?></div>
                        <div style="margin-bottom: 8px"><em style="font-style: normal; color: #999;">语种：</em><?php echo $row["language"]?></div>
                        <div style="margin-bottom: 8px"><em style="font-style: normal; color: #999;">评分：</em><?php echo $row["score"]?></div>
                        <div style="margin-bottom: 8px"><em style="font-style: normal; color: #999;">简介：</em><span><?php echo $row["abstract"]?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-comment">
            <div class="content-comment-top">
                <div style="width: 10% ;height: 50px ;float: left;padding-top: 10px">
                    共<?php echo $count?>条评论
                </div>
                <div class="content-comment-top-page" style="height: 70px; float:right;margin: 10px 0% 0 0">
                    <nav >
                        <ul class="pagination pagination-sm">
                            <li>
                                <a href="detail.php?news_id=<?php echo $news_id?>&pageindex=<?php echo $pageindex-1 < 0 ? 0 : $pageindex-1  ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php while ($page>0){
                            ?>
                            <li <?php if($num == $pageindex)echo "class='active'"?>><a href="detail.php?news_id=<?php echo $news_id?>&pageindex=<?php echo $num?>"><?php echo $num+1?></a></li>
                            <?php
                            $page --;
                            $num ++;
                            }?>
                            <li>
                                <a href="detail.php?news_id=<?php echo $news_id?>&pageindex=<?php echo $pageindex+1>=ceil($count/$pagesize) ? ceil($count/$pagesize)-1:$pageindex+1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="content-comment-public">
                <?php
                if(!empty($_SESSION["user_id"])){
                ?>
                <form action="../news/saveComment.php" method="post">
                    <input type="hidden" name="news_id" value="<?php echo $news_id?>">
                    <div class="content-comment-public-left">
                        <img src="<?php echo $_SESSION["head_pic"]?>" style="height: 50px;width: 50px;" class="img-circle">
                    </div>
                    <div class="content-comment-public-right">
                        <textarea class="form-control" name="comment" rows="3" id="text"></textarea>
                        <button  type="submit" id="btn" class="btn btn-primary">发表<br>评论</button>
                    </div>
                </form>
                <?php }
               else {
                    ?>
                <div class="content-comment-public-left">
                    <img src="<?php echo "../user/uploads/默认头像.jpg"?>" style="height: 50px;width: 50px;" class="img-circle">
                </div>
                <div class="content-comment-public-right" style="padding-top: 30px">
                    <a href="login.php">评论请先登录</a>
                </div>
                <?php }
                ?>
            </div>
            <?php
            $num = 5;
            while($row_comment = mysqli_fetch_array($res_comment,MYSQLI_ASSOC))
            {
                $thumbup=$row_comment["thumbup"];$thumbdown=$row_comment["thumbdown"];
            ?>
                <script>
                    function changeimgup<?php echo $num ?>() {
                        var img=document.getElementById("thumbup<?php echo $num ?>");
                        var img2=document.getElementById("thumbdown<?php echo $num ?>");
                        var num=document.getElementById("thnumup<?php echo $num ?>");
                        var num2=document.getElementById("thnumdown<?php echo $num ?>");
                        if (img.src.match("thumbup1"))
                        {
                            if(img2.src.match("thumbdown3")){
                                img2.src="../common/background/thumbdown1.png";
                                num2.innerHTML=parseInt(num2.innerHTML)-1;

                            }
                            img.src="../common/background/thumbup3.png";
                            num.innerHTML=parseInt(num.innerHTML)+1;


                        }
                        else
                        {
                            img.src="../common/background/thumbup1.png";
                            num.innerHTML=parseInt(num.innerHTML)-1;

                        }

                    }
                    function changeimgdown<?php echo $num ?>() {
                        var img=document.getElementById("thumbdown<?php echo $num ?>");
                        var img2=document.getElementById("thumbup<?php echo $num ?>");
                        var num=document.getElementById("thnumdown<?php echo $num ?>");
                        var num2=document.getElementById("thnumup<?php echo $num ?>");
                        if (img.src.match("thumbdown1"))
                        {
                            if(img2.src.match("thumbup3")){
                                img2.src="../common/background/thumbup1.png";
                                num2.innerHTML=parseInt(num2.innerHTML)-1;

                            }
                            img.src="../common/background/thumbup3.png";
                            img.src="../common/background/thumbdown3.png";
                            num.innerHTML=parseInt(num.innerHTML)+1;

                        }
                        else
                        {
                            img.src="../common/background/thumbdown1.png";
                            num.innerHTML=parseInt(num.innerHTML)-1;
                        }

                    }
                    function showinfo<?php echo $num ?>() {
                        setTimeout(function(){
                            document.getElementById('info<?php echo $num ?>').style.display='block';
                        },300);
                    }
                    function hidinfo<?php echo $num ?>() {
                        setTimeout(function(){
                            document.getElementById('info<?php echo $num ?>').style.display='none';
                        },300);

                    }
                </script>
                <div class="content-comment-public-text">
                    <div class="group">
                        <div class="group-left">
                            <img src="<?php echo $row_comment["head_pic"]?>" style="height: 50px;width: 50px;" class="img-circle" onmouseover="showinfo<?php echo $num ?>()" onmouseout="hidinfo<?php echo $num ?>()">
                        </div>
                        <div class="group-right">
                            <div class="group-right-username">
                                <a href="lookInfo.php?id=<?php echo $row_comment["user_id"]?>&pageindex=<?php echo $pageindex?>&news_id=<?php echo $news_id?>"><?php echo $row_comment["nickname"]?></a>
                                <div id="info<?php echo $num ?>" class="group-right-info"  onmouseover="showinfo<?php echo $num ?>()" onmouseout="hidinfo<?php echo $num ?>()">
                                    <div class="group-right-info-top">
                                        <img src="../common/background/info.jpg">
                                    </div>
                                    <div class="group-right-info-content">
                                        <img src="<?php echo $row_comment["head_pic"]?>" class="img-circle">
                                        <span style="margin-left: 15px;font-weight: bold;"><a href="lookInfo.php?id=<?php echo $row_comment["user_id"]?>&pageindex=<?php echo $pageindex?>&news_id=<?php echo $news_id?>"><?php echo $row_comment["nickname"]?></a></span>
                                        <div><span style="margin-right: 10px"> 关注:123</span><span>粉丝:123</span></div>
                                        <div style="margin-top: 10px;color:gray;">"<?php echo $row_comment["signature"]?>"</div>
                                    </div>
                                </div>
                            </div>

                            <div class="group-right-content">
                                <div id="show">
                                    <?php echo $row_comment["comment"]?>
                                </div>
                                <div class="group-right-footer">
                                    <div class="group-right-footer-content">#<?php echo $floor--?></div>
                                    <div class="group-right-footer-content"><?php echo $row_comment["time"]?></div>
                                    <div class="group-right-footer-content" style="float: left;padding-bottom: 2px">
                                        <a href="../news/thumbUpdate.php?comment_id=<?php echo $row_comment["comment_id"]?>&thumbup=<?php echo $thumbup+=1?>&thumbdown=<?php echo $thumbdown?>" ><img id="thumbup<?php echo $num ?>" src="../common/background/thumbup1.png" onclick="changeimgup<?php echo $num ?>();"></a>
                                        <span id="thnumup<?php echo $num ?>"><?php echo $row_comment["thumbup"]?></span>
                                    </div>
                                    <div class="group-right-footer-content" style="float: left">
                                        <a href="../news/thumbUpdate.php?comment_id=<?php echo $row_comment["comment_id"]?>&thumbup=<?php echo $thumbup-=1?>&thumbdown=<?php echo $thumbdown+=1?>" ><img id="thumbdown<?php echo $num ?>" src="../common/background/thumbdown1.png" onclick="changeimgdown<?php echo $num ?>()"></a>
                                        <span id="thnumdown<?php echo $num ?>"><?php echo $row_comment["thumbdown"]?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <?php
                $num --;}
            ?>
        </div>
        <div class="content-more">
            <div class="content-more-title">
                大家都在看
            </div>
            <div class="content-more-intro">
                <?php
                $num = 6;
                while($num>0){
                    $row_else = mysqli_fetch_array($res_else,MYSQLI_ASSOC)
                    ?>
                    <a href="detail.php?news_id=<?php echo $row_else["news_id"]?>">
                        <div class="spread-module">
                            <img src="../news/<?php echo $row_else["pic"]?>">
                            <div class="content-more-name"><?php echo $row_else["title"]?></div>
                        </div>
                    </a>
                    <?php
                    $num --;
                } ?>
            </div>
        </div>
    </div>
<?php
    include dirname(__FILE__) . "/../common/footer.php";
?>
</body>
</html>