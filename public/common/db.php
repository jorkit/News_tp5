<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:26
 */
$con = mysqli_connect("localhost","root","","NewsDB");
if(!$con){
    die("数据库连接失败！");
}
mysqli_query($con,"set names utf8");