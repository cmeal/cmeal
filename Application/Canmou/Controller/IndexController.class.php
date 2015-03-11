<?php
namespace Canmou\Controller;
use Canmou\Controller\AdminController;
class IndexController extends AdminController {
    public function index(){
        $pronum=M('products')->count();
        $adminnum=M('admin_user')->count();
        $usernum=M('users')->count();
        $shopnum=M('shop')->count();
        $this->assign(
            array(
                'action'=>"index",
                "pronum"=>isset($pronum)?$pronum:0,
                "adminnum"=>isset($adminnum)?$adminnum:0,
                "shopnum"=>isset($shopnum)?$shopnum:0,
                "usernum"=>isset($usernum)?$usernum:0,
            )
        );
        $this->display('index');
    }
    public function login(){
        //TODO 添加验证码
    }
    public function logout(){

    }
}