<?php
namespace Home\Controller;
use Think\Controller;
class AdmController extends Controller {
   function __construct(){
     parent::__construct();

     $this->mid = session('mid');
     if( $this->aid<1){
       return $this->error("账号或密码错误","/Home/Login/index");
     }
     $this->user = D("tb_master")->where( array('mid'=>$this->mid))->find();
     if(!$this->user){
       return $this->error("无效的账号","/Home/Login/index");
     }

   }
}
