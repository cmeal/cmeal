<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/22
 * Time: 16:14
 */
namespace Canmou\Model;
use Think\Model;
class ProductModel extends Model {

    protected $tableName = 'products';
    /* 自动验证规则 */
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
        //0 存在字段就验证（默认）
        //1 必须验证
        //2 值不为空的时候验证
        array('title', 'require', '填写商品名',1),

        array('cid', 'number', '填写产品分类', 1),
        array('shop_id', 'number', '填写产品所属店铺', 1),

        array('body', 'require', '填写商品描述',1),

        array('image_path', 'require', '填写商品图片',1),
        array('main_image', 'require', '设置商品主图',1),

        array('cost', 'number', '成本价格填写数字', 1),
        array('sell_price', 'number', '销售价格填写数字', 1),
        array('vip_price', 'number', '会员价格填写数字', 1),
        array('status', array(0,1), '状态填写数字', 1 ,'in'),

    );

    protected $_auto = array (
        //1,新增数据的时候处理（默认）
        //2,更新数据
        //3,所有情况
        array('created','time',1,'function'),
        array('updated','time',3,'function'), // 对update_time字段写入当前时间戳
    );

    public function cates($categories=null,$id=0){
        if($categories==null){
            $categories = $this->table('categories')->field('cid,name')->select();
        }
        if($id!=0){
            foreach($categories as $key => $value){
                if($value['cid']==$id){
                    unset($categories[$key]);
                }
            }
        }
        return $categories;
    }

    public function shop($shop=null,$id=0){
        if($shop==null){
            $shop = $this->table('shop')->field('sid,name')->select();
        }
        if($id!=0){
            foreach($shop as $key => $value){
                if($value['sid']==$id){
                    unset($shop[$key]);
                }
            }
        }
        return $shop;
    }

    public function size($pro_size=null){
        $size = array(
            '500克',
            '盒',
            '瓶',
            '只',
            '袋',
        );
        if($pro_size==null){
            return $size;
        }
        foreach($size as $key => $value){
            if($value==$pro_size){
                unset($size[$key]);
            }
        }
        return $size;
    }

    public function getProduct($id,$categories,$shops){
        $product = $this->where('pid='.$id)->find();
        $imgs = $product['image_path'];
        $imgs_array = explode(';',$imgs);
        $new_imgs=array();
        foreach($imgs_array as $value){
            $new_imgs[]=$value;
        }
        $product['files']=$new_imgs;
        foreach($categories as $key => $value){
            if($product['cid']==$value['cid']){
                $product['cate_name']=$value['name'];
            }
        }
        foreach($shops as $key => $value){
            if($product['shop_id']==$value['sid']){
                $product['shop_name']=$value['name'];
            }
        }
        return $product;
    }
}