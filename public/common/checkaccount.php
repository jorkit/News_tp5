<?php
/**
 * Created by PhpStorm.
 * User: 潘多拉
 * Date: 2018/7/25
 * Time: 23:23
 */
    include_once dirname(__FILE__) . "/../common/db.php";
    $res = mysqli_query($con,"select account from user");
    if($res){
        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
            if($_POST["saccount"] == $row["account"]){
                ?>
                <script type="text/javascript">
                    alert("账号或用户名已被注册！")
                </script>
                <?php header("Refresh: 0.01; url=../frontEnd/registe.php");
               die;
            }
        }
    }
    else {
        ?>
        <script type="text/javascript">
            alert("注册出错！")
        </script>
        <?php header("Refresh: 0.01; url=../page/registe.php");die;
    }