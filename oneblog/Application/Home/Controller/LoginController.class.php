<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){

      $do = I("get.do");
      if($do=='chk'){
        $auser = I('post.auser');
        $apass = I('post.apass');
        $admin = D('tb_master');

        $where = array(
           'master_name' => $auser,
           'master_password' => $apass,
        );

        $user = $admin->where($where)->find();

        if(!$user){
          return $this->error("账号或密码错误","/Home/Login");
        }
        session("mid",$user['mid']);
        return $this->error("登录成功","/Home/Login/master");

          $this->assign("master",$user);

      }
      $this->display();
    }
public function master(){
  $this->mid = session('mid');

  if( !$this->mid){
    return $this->error("请先登录","/Home/Login/index");
  }
  $tb_master = D('tb_master');
  $where = array(
     'mid' => $this->mid

  );

  $master=$tb_master->where($where)->find();
  $this->assign("master",$master);
  $this->display();
}


    function logout(){
      session('mid',null);
      return $this->success("退出成功","/Home");
    }



        public function delete(){
          $aid = I("get.aid");
         D("admin")->where( array('aid'=>$aid))->delete();
          return $this->redirect("/Admin/Auser");
        }
         public function _edit( $aid ){
           $admin = D("admin");
           if(IS_POST){
             $auser = I("post.auser");
             $apass = I("post.apass");

             $rule= array(
                       array('auser','require','用户名不能为空'), //默认情况下用正则进行验证
                       array('apass','require','密码不能为空'),
                    );
                 if( !$admin->validate($rule)->create() ){
                     return $this->error( $admin->getError(),"/Admin/Auser/add");
                 }
               $where = array();
               $where['auser'] = $auser;
               $where['aid'] = array('NEQ',$aid);
               $isArr = $admin->where( $where)->find();
               if( $isArr){
                   return $this->error('用户名已存在',"/Admin/Auser/add");
               }

               $insert = array(
                    'auser' => $auser,
                    'apass' => $apass,
               );
               $is = $admin->where( array('aid'=>$aid) )->save( $insert );
                return $this->success("成功修改{$is}条数据","/Admin/Auser/index");


          }

         }


        public function save(){


          $admin = D("tb_master");
          $auser = I("post.auser");
          $apass = I("post.apass");
         var_dump($auser);
          var_dump($apass);
            $rule= array(
                      array('auser','require','用户名不能为空'), //默认情况下用正则进行验证
                      array('apass','require','密码不能为空'),
                   );

           if (!$admin->create()){
          return $this->error('用户名密码不能为空',"/Home/Login/add");
  
           }else{

            $insert = array(
                   'master_name' => $auser,
                   'master_password' => $apass,
              );
              var_dump($insert);
              $aid = $admin->add( $insert );
              var_dump($aid);
              if( $aid){
                 return $this->success('操作成功',"/Home/Index");
               }else{
                 return $this->error('操作失败',"/Home/Login/add");
               }
     }

         }



}
