<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/22
 * Time: 10:56
 */
namespace Canmou\Controller;
use Canmou\Controller\AdminController;
use Think\Hook;

class UserController extends AdminController {
    public function index(){
        $this->assign(
            array(
                "action"=>"user_list",
            )
        );
        $this->display('index');
    }
    public function admin(){
//        Hook::add('Tip','Behavior\\TipBehavior');
        $row =C('PAGE_ROW');
        $admin_user = M("admin_user");
        $count = $admin_user->count();
        $Page = new \Think\Backpage($count,$row);
//        $Page->parameter['key']   =   urlencode('val');
        $show       = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $users=$admin_user->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign(
            array(
                "action"=>"admin_list",
                "users"=>$users,
                "count"=>$count,
            )
        );
        $this->display('admin');
    }

    /**
     * 只针对后台管理员用户才可以添加
     */
    public function add(){
        if(IS_POST){
            $User = D("User");
            if(!$User->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                setMessage($User->getError(),'error');
            }else{
                // 验证通过 写入新增数据
                $User->add();
                redirect('/canmou/user/admin');
            }
                // 对data数据进行验证
//            $name=$_POST['name'];
//            $passwd=$_POST['password'];
//            $conf_psd=$_POST['repassword'];
        }
        $this->assign(
            array(
                "action"=>"admin_list",
                'usertype'=>'add',
            )
        );
        $this->display('add');
    }

    public function edituser(){
        $id = I('id');
        if(!isset($id)||!is_numeric($id)){
            setMessage("信息错误",'error');
            redirect("");
        }
        if(IS_POST){
            //TODO 保存信息

        }else{
            //查询信息
        }
        $this->display('edit');
    }

    /**
     * 管理员编辑
     */
    public function editadmin(){
        $id = I('id');
        if(!isset($id)||!is_numeric($id)){
            setMessage("信息错误",'error');
            redirect("");
        }
        if(IS_POST){
            //TODO 保存信息

        }else{
            //查询信息
        }
    }

    /**
     * 商品上传图片保存
     */
    public  function fileupload(){
        if(!IS_POST){
            return;
        }
        //TODO 判断图片是否在文件中存在

        $root = $_SERVER['DOCUMENT_ROOT'];//F:/wamp/www/tp_ubive
        $uploadPath = $root.'/Public/upload/';//文件保存路径
        $type = $_FILES["file"]["type"];
        //判断上传文件的类型
        if($type=='image/jpg'|| $type=='image/jpeg'){
            $filetype='.jpg';
        }elseif($type=='image/png'){
            $filetype='.png';
        }else{
            return;
        }
        $savename = $uploadPath.time().$filetype;
        $tmp = fopen($_FILES["file"]["tmp_name"], "rb");//打开上传的临时文件
        $tmpbuff = fread($tmp, $_FILES["file"]["size"]);//读取临时文件
        $savefile = fopen($savename,'w');//打开，准备写目标文件
        fwrite($savefile,$tmpbuff);
    }
}