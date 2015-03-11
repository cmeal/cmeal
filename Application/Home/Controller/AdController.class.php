<?php
namespace Home\Controller;
use Think\Controller;
class AdController extends Controller {
    public function adclick(){
        //TODO 对广告点击事件进行统计
        $id = $_GET['id'];
        $model = M('ads');
        $ad = $model->where('aid='.$id)->find();
        if($ad){
            redirect($ad['url']);
        }else{
            redirect('/');
        }
    }
}