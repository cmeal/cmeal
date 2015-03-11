<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $model = D('index');
        $ads =$model->ads();
        $categories = $model->categories();
        $products_list = array();
        foreach($categories as $key=>$value){
            $products_list[$key]['cate_name'] = $value['name'];
            $products_list[$key]['pro_list'] = $model->products($key);
        }

        $this->assign(
            array(
                'ads'=>$ads,
                'categories'=>$categories,
                'products_list'=>$products_list,
            )
        );
        $this->display('index');
    }
}