<?php
namespace Home\Controller;
use Think\Controller;
//use Think\Controller\restController;
class SysmanageController extends Controller {
    /*
    *
    *
    */
     public function __construct()
    {
      # code...
      if(!session('user')){
        //$this->ajaxReturn(array('code'=>-1,'message'=>'fail','data'=>'not login'));
        $this ->redirect('login/login',Null,0);
      }
      parent::__construct();
        $user =  session('user');
        $this->assign('user',$user);
        $this->assign('active','sysmanage');


    }
    public function pwdManage(){
        $this->display('sysManage/pwdManage');
    }

}
