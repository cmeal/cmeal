<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/2/28
 * Time: 18:03
 */
namespace Home\Model;
use Think\Model;
class IndexModel extends Model{
    //TODO ad
    //TODO categories
    //TODO products
    public function ads(){
        //TODO 链接跳转到控制器中，由控制器统计，最后跳转到数据库中的url，即目标地址
        $ads = $this->table('ads')->where('status=1')->order('updated')->limit(5)->select();
        $data = array();
        foreach($ads as $key =>$value){
            $data[$key] = $value;
            $data[$key]['image_link']='Public/upload/ad_img/'.$value['image_path'];
            $data[$key]['url_link']='/ad/adclick?id='.$value['aid'];
        }
        return $data;
    }

    public function categories(){
        $tree=array();
        $cates = $this->table('categories')->order('sort_weight')->where('status=1')->select();
        // 生成一级类目
        foreach ($cates as $key => $row) {
            if ($row['parent_id'] == 0) {
                $row['children'] = array();
                $tree[$row['cid']] = $row;
                unset($cates[$key]);
            }
        }
        // 生成二级类目
        foreach ($cates as $row) {
            if (isset($tree[$row['parent_id']])) {
                $tree[$row['parent_id']]['children'][] = $row;
            }
        }
        return $tree;
    }

    public function products($cid){
        //TODO 多个不同类目的商品，多个楼层
        //根据分类的id获取多个商品
        $where['status']=1;
        $where['parent_cid|cid']=$cid;
        $products  = $this->table('products')->where($where)->order('updated desc')->select();
        return $products;
    }

}