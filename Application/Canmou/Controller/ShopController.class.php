<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/2/3
 * Time: 22:29
 */
namespace Canmou\Controller;
use Canmou\Controller\AdminController;
class ShopController extends AdminController{
    public function index(){
        $Shop = M("Shop");
        $rs = $Shop->select();
        $count = $Shop->count();
        $this->assign(
            array(
                "action"=>"shop_list",
                "shops"=>$rs,
                "count"=>count($rs),
            )
        );
        $this->display('index');

    }
    public function add(){
        if(IS_POST){
            $Shop = D("Shop");
            $data = $Shop->get_data('add');
            if(!$data){
                setMessage('提交数据不完整','error');
                redirect('/canmou/shop/add');
            }
            if(!$Shop->create($data)){
                setMessage($Shop->getError(),'error');
            }else{
                $Shop->add();
                setMessage('保存成功','success');
                redirect('/canmou/shop/index');
            }
        }
        $this->assign(
            array(
                "action"=>"shop_list",
            )
        );
        $this->display('edit');
    }

    public function edit(){
        $id = $_GET['id'];
        if(empty($id)){
            setMessage('不存在该店铺信息','error');
            redirect('/canmou/shop/index');
        }
        if(IS_POST){
            $shop_model = D('Shop');
            $data = $shop_model->get_data();
            if(!$data){
                setMessage('提交数据不完整','error');
                redirect('/canmou/shop/edit?id'.$id);
            }
            if(!$shop_model->create($data)){
                setMessage($shop_model->getError(),'error');
                redirect('/canmou/shop/edit?id'.$id);
            }else{
                $data['sid']=$id;
                $save_rs = $shop_model->save($data);
                setMessage('保存成功','success');
                redirect('/canmou/shop/index');
            }
        }
        $Shop = M("Shop");
        $shop = $Shop->where('sid='.$id)->find();
        if(!$shop){
            setMessage('不存在该店铺信息','error');
            redirect('/canmou/shop/index');
        }
        $shop['img_path']="/Public/upload/shop_img/".$shop['image'];
        $this->assign(
            array(
                "action"=>"shop_list",
                "shop"=>$shop,
            )
        );
        $this->display('edit');
    }
//TODO view中没未做二次信息确认
    public function delete(){
        //TODO delete the shop
        $id = $_GET['id'];
        if(empty($id) || !is_numeric($id)){
            setMessage('不存在该店铺信息','error');
            redirect('/canmou/shop/index');
        }
        $Shop = M("Shop");
        $rs = $Shop->where('sid='.$id)->delete();
        if($rs){
            setMessage('店铺信息删除成功','error');
        }else{
            setMessage('店铺信息删除失败','error');
        }
        redirect('/canmou/shop/index');
    }
}