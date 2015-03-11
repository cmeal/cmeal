<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/2/28
 * Time: 18:03
 */
namespace Home\Model;
use Think\Model;
class ProductModel extends Model{
    public function product($pid){
        //TODO 多个不同类目的商品，多个楼层
        //根据分类的id获取多个商品
        $where['status']=1;
        $where['pid']=$pid;
        $products  = $this->table('products')->where($where)->find();
        return $products;
    }
    //设置一个默认的店铺信息
    public function shop_info($shop_id){
        $where['sid'] = $shop_id;
        $shop = $this->table('shop')->where($where)->find();
        if(empty($shop)){
            //TODO 设置一个默认的店铺信息
        }
        return $shop;
    }

}