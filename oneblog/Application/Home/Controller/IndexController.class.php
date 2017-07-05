<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    function __construct(){
      parent::__construct();
       $this->setting = D("Admin/Setting");
       $this->cfg = $this->setting->getAll();

    }

    public function index(){

      $pageModel = D("page");
      $count= $pageModel->count();// 查询满足要求的总记录数
      $page= new \Think\Page($count,$this->cfg['readnum']);// 实例化分页类 传入总记录数和每页显示的记录数
                         //排序
      $blogs =$pageModel->order('pid desc')->limit($page->firstRow.','.$page->listRows)->select();

      $this->assign("show",$page->show());
      $this->assign("blogs",$blogs);


     $this->assign('cfg',$this->cfg);

     $this->display();
    }
    public function read(){
     $pid = I("get.pid");

      $pageModel = D("page");
      $this->assign("blog",$pageModel->where( array('pid'=>$pid))->find());

       $this->assign('cfg',$this->cfg);
         $this->display();
    }
    public function login(){
      $mid = session('mid');

        $this->display();

      }


    
}
