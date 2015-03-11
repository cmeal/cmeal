<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function login(){
        $this->display('login');

    }

    public function register(){
        $this->display('register');
    }
    public function passwd(){

    }
}