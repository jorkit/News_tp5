<?php
namespace app\admin\controller;

use think\Controller;

use app\index\model\News;

class Index extends Controller{

	public function index(){

		return $this->fetch();
	}

	public function news_paging(){
		$pagesize = 3;
	    $pageindex = 0;
	    if(!empty($_GET["pageindex"])){
	        $pageindex = $_GET["pageindex"];
	    }
	    $offset = $pageindex * $pagesize;
	    //排序编号
	    $number = $pageindex * $pagesize ;
	}

	public function newsList(){
		$this->news_paging();
		$count = News::count();
		$pages = ceil($count/$pagesize);
		$this->assign([
			'count'=>$count,
			'$pages'=>$pages,
		])

	}
}