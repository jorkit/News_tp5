<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/30
 * Time: 10:16
 */
session_start();
$check = $_SESSION["role_id"];
if($check != 1){
    ?>
    <script type="text/javascript">
        alert("对不起，您没有访问权限!")
    </script>
    <?php header("Refresh: 0.01; url=../backstage/home.php");die;
}