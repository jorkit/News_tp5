<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/30
 * Time: 10:16
 */
    include_once dirname(__FILE__) . "/checkRole.php";
    $check = $_SESSION["user_id"];
    $pageindex = $_SESSION["pageindex"]-1;
    if ($_SESSION["role_id"] !=1 && $check!=$_GET["editor_id"]){
            ?>
            <script type="text/javascript">
                alert("对不起，您没有访问权限!")
            </script>
            <?php header("Refresh: 0.01; url=../backstage/newsList.php?pageindex=$pageindex");
            die;
        }