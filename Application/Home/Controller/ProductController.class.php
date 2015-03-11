<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
    public function item(){
        $pid = $_GET[id];
        if(empty($pid)||!is_numeric($pid)){
            redirect('/');
        }
        $product_model = D('product');
        $product = $product_model->product($pid);
        if(empty($product)){
            redirect('/');
        }
        $shop = $product_model->shop_info($product['shop_id']);
        $this->assign(
            array(
                'product'=>$product,
                'shop'=>$shop,
            )
        );
        $this->display('index');
    }

    //关键词搜索
    public function search(){

    }
}