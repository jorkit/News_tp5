<?php
namespace app\index\controller;

use think\Controller;

use app\index\model\News;

use app\index\model\Newstype;  

class Index extends Controller
{
   
    public function index(){

		$k = 0;

	    $newstype = Newstype::all();
	  
	    $news_left = News::all();

	    $news_right = News::order('score')->field('title,news_id,type_id')->select();
	    
	    $this->assign([
	    	'newstype'  => $newstype,
	    	'news_left' => $news_left,
	    	'news_right'=> $news_right,
	    	'k'  		=> $k
	    ]);
	    return $this->fetch();
	    // dump($news_left);
	
    }
 
}
