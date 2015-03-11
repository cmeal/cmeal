<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/2/20
 * Time: 23:11
 */

namespace Canmou\Controller;
use Canmou\Controller\AdminController;

class AdController extends AdminController
{
//    public function _before_edit(){
//
//    }
    public function index()
    {
        $ad_model  =M("ads");
        $ads =$ad_model->select();
        $this->assign(
          array(
              'ads'=>$ads,
              'count'=>count($ads),
              'action'=>'ad_list',
          )
        );
        $this->display('index');
    }

    public function add(){
        if(IS_POST){
            $data['name']=$_POST['name'];
            $data['desc']=$_POST['desc'];
            $data['url']=$_POST['url'];
            $data['type']=$_POST['type'];
            $data['status']=$_POST['status'];
            $data['created']=time();
            $data['updated']=time();
            $ad_model = D('Ad');
            $savename = $ad_model->save_img();
            if($savename){
                $data['image_path']=$savename;
            }else{
                $data['image_path']='';
            }
            if(!$ad_model->create($data)){
                setMessage($ad_model->getError(),'error');
            }else{
                $ad_model->add($data);
                setMessage('保存成功','success');
                redirect('/canmou/ad/index');
            }
        }
        $this->assign(
            array(
                'action'=>'ad_list',
            )
        );
        $this->display('edit');

    }
    public function edit(){
        $aid = $_GET['id'];

        if(empty($aid)){
            setMessage('不存在该广告信息','error');
            redirect('/canmou/ad/index');
        }
        if(IS_POST){
            $data['aid']=$aid;
            $data['name']=$_POST['name'];
            $data['desc']=$_POST['desc'];
            $data['url']=$_POST['url'];
            $data['type']=$_POST['type'];
            $data['status']=$_POST['status'];
            $data['updated']=time();
            $ad_model = D('Ad');
            $savename = $ad_model->save_img();
            if($savename){
                $data['image_path']=$savename;
            }
            if(!$ad_model->create($data)){
                setMessage($ad_model->getError(),'error');
            }else{
                $ad_model->save($data);
                setMessage('保存成功','success');
                redirect('/canmou/ad/index');
            }
        }
        $Ad = M("Ads");//没有经过model，直接用数据库的表名
        $ad =$Ad->where('aid='.$aid)->find();

        if(!$ad){
            setMessage('不存在该广告信息','error');
            redirect('/canmou/ad/index');
        }
        $ad['img'] = '/Public/upload/ad_img/'.$ad['image_path'];
        $this->assign(
            array(
                'action'=>'ad_list',
                'ad'=>$ad,
            )
        );
        $this->display('edit');

    }

    public function delete(){
        $id = $_GET['id'];
        if(empty($id)|| !is_numeric($id)){
            setMessage('此广告信息不存在','error');
        }else{
            $ad_model = M('ads');
            $ad_model->delete($id);
            setMessage('广告信息删除成功','error');
        }
        redirect('/canmou/ad/index');
    }
} 