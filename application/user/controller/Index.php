<?php

namespace app\user\controller;

use think\Controller;

use app\user\model\User;

use app\index\controller\Index as Homepage;

class Index extends Controller{

	public function login(){
	    return $this->fetch();
	}


	public function doLogin(){
		$account = $_REQUEST["saccount"];
        $password = $_REQUEST["spassword"];
       	$res = User::all();
        foreach ($res as $key => $row) {
        	if($row['account'] == $account){
        		Session('account',$row["account"]);
        		if($row['password'] == $password){
        				Session('role_id',$row["role_id"]);
                        Session('user_id',$row["id"]);
                        Session('nickname',$row["nickname"]);
                        if(empty($row["head_pic"])){
                           Session('head_pic','../user/uploads/默认头像.jpg');
                        }
                        else Session('head_pic',$row["head_pic"]);                                                         
        		
        		}
        		else{
        		 $this->error('密码输入错误，请重新登录！'); 
            	}
       		}      		
		}

	    if(Session('account') != $account){
       		 $this->error('账号输入错误，请重新登陆！');
       		}
		$this->success('登陆成功！','/');
	}

	
	public function info(){
		$res = User::get(Session('user_id'));
		$account = $res->account;
		$nickname = $res->nickname;
		$head_pic = $res->head_pic;
		$age = $res->age;
		$sex = $res->sex;
		$signature = $res->signature;
		$this->assign([
			'account'=>$account,
			'nickname'=>$nickname,
			'head_pic'=>$head_pic,
			'age'=>$age,
			'sex'=>$sex,
			'signature'=>$signature
		]);
	}

	public function userInfo(){
		Index::info();
		return $this->fetch();
	}


	public function infoUpdate(){
		$this->info();
		return $this->fetch();
	}

	public function saveInfo(){

		$check = User::get(Session('user_id'))->password;

	    $allowedExts = array("gif", "jpeg", "jpg", "png");
	    $temp = explode(".", $_FILES["pic"]["name"]);
	    $extension = end($temp);     // 获取文件后缀名
	    if (empty($_FILES["pic"]["name"])){
	        $imgurl = $_POST["spic"];
	    } //echo $_FILES["pic"]["size"];
	    else if ((($_FILES["pic"]["type"] == "image/gif")
	            || ($_FILES["pic"]["type"] == "image/jpeg")
	            || ($_FILES["pic"]["type"] == "image/jpg")
	            || ($_FILES["pic"]["type"] == "image/pjpeg")
	            || ($_FILES["pic"]["type"] == "image/x-png")
	            || ($_FILES["pic"]["type"] == "image/png"))
	        && ($_FILES["pic"]["size"] < 2048000)   // 小于 2000 kb
	        && in_array($extension, $allowedExts)) {
	        move_uploaded_file($_FILES["pic"]["tmp_name"], "/static/uploads/user/uploads/" . iconv("UTF-8", "gbk",$_FILES["pic"]["name"]));
	        $imgurl = "../user/uploads/" . $_FILES["pic"]["name"];

	        //    echo  "文件以保存到：../user/upload/".$_FILES["img"]["name"];
	    }
	    else {
	            ?>
	            <script type="text/javascript">
	                alert('非法文件，请选择正确图片!')
	            </script>
	            <?php
	            header("Location:http:infoUpdate");die;
	    }
	        if (empty($_POST["snickname"])) {
	            ?>
	            <script type="text/javascript">
	                alert("昵称不能为空!")
	            </script>
	            <?php header("Refresh: 0.01; url=infoUpdate");die;
	        } else if (empty($_POST["sage"])) {
	            ?>
	            <script type="text/javascript">
	                alert("年龄不能为空！")
	            </script>
	            <?php header("Refresh: 0.01; url=infoUpdate");die;
	        } else if (empty($_POST["ssex"])) {
	            ?>
	            <script type="text/javascript">
	                alert("性别未选择!")
	            </script>
	            <?php header("Refresh: 0.01; url=infoUpdate");die;
	        } else if ($_POST["spasswordOld"] != $check) {
	            ?>
	            <script type="text/javascript">
	                alert("原密码错误！请重试")
	            </script>
	            <?php header("Refresh: 0.01; url=infoUpdate");die;
	        }  else if ($_POST["spasswordcheck"] != $_POST["spassword"]){
	            ?>
	            <script type="text/javascript">
	                alert("两次密码不同请重新确认！")
	            </script>
	            <?php header("Refresh: 0.01; url=infoUpdate");die;
	        }
	        //date_default_timezone_set("PRC");
	        //if(!$time= date ("Y-m-d H;i;s")){
	        //    die("获取时间失败！");
	        //}
	        else {
	            $id = Session('user_id');
	            $nickname = $_POST["snickname"];
	            if(!empty($_POST["spassword"])) {
	                $password = $_POST["spassword"];
	            }
	            else $password = $_POST["spasswordOld"];

	            $head_pic = Session('head_pic');
	            $age = $_POST["sage"];
	            $sex = $_POST["ssex"];
	            $signature = $_POST["ssignature"];
	            $update = [
	            	'nickname'=>$nickname,
	            	'password'=>$password,
	            	'age'	  =>$age,
	            	'sex'	  =>$sex,
	            	'head_pic'=>$head_pic,
	            	'signature'=>$signature
	           ];

	            $res = User::where('id',$id)->setField($update);	          
	            if ($res) {	                
	                $_SESSION["head_pic"] = $imgurl;
	                $_SESSION["nickname"] = $nickname;
	                $this->success('更新成功！','userInfo');
	            } else {
	               $this->error('更新失败！','userInfo');
	            }
	        }
	}		
}		