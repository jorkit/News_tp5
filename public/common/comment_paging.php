<?php
/**
 * Created by PhpStorm.
 * User: 潘多拉
 * Date: 2018/7/20
 * Time: 21:07
 */
$pagesize = 3;
$pageindex = 0;
if(!empty($_GET["pageindex"])){
    $pageindex = $_GET["pageindex"];
}
$offset = $pageindex * $pagesize;
//排序编号
$number = $pageindex * $pagesize ;