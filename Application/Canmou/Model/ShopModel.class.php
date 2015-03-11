<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/22
 * Time: 16:14
 */
namespace Canmou\Model;
use Think\Model;
class ShopModel extends Model {

    protected $tableName = 'shop';
    /* 自动验证规则 */
    //当create无参数时，验证的是表单的信息，所以字段名与表单名相同
    //当create传入参数时，验证参数的信息
    //调用d方法，create返回成功的信息时，是根据表结构生成数据，表结构中不存在的字段，返回数据中不包含，但是，如果要验证信息的话，还是会自动验证信息的
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
        //0 存在字段就验证（默认）
        //1 必须验证
        //2 值不为空的时候验证
        array('name', 'require', '填写商店名',1),
        array('desc', 'require', '填写描述',1),
        array('address', 'require', '填写地址名',1),
        array('image', 'require', '上传图片',0),
        array('qq', 'number', 'QQ填写数字', 1),
        array('telephone', 'number', '电话填写数字', 1),
        array('status', array(0,1), '状态错误', 1 ,'in'),
    );

    protected $_auto = array (
        //1,新增数据的时候处理（默认）
        //2,更新数据
        //3,所有情况
        array('created','time',1,'function'),
        array('updated','time',3,'function'), // 对update_time字段写入当前时间戳
    );

    public function get_data($action='edit'){
        $data['name']=$_POST['name'];
        $data['desc']=$_POST['desc'];
        $data['address']=$_POST['address'];
        $data['telephone']=$_POST['telephone'];
        $data['qq']=$_POST['qq'];
        $data['status']=$_POST['status'];
        if($action=='add'){
            $data['image']='';
        }elseif($action=='edit'){
            $data['updated']=time();//用edit方法时，save不会自动完成这个参数的值
        }
        if($_FILES['shop_img']['tmp_name']){
            $root = $_SERVER['DOCUMENT_ROOT'];
            $uploadpath = $root.'/Public/upload/shop_img/';
            $type = img_type($_FILES['shop_img']['type']);
            $savename = 'shop_'.time().$type;
            $content = file_get_contents($_FILES['shop_img']['tmp_name']);
            file_put_contents($uploadpath.$savename,$content);
            $data['image']=$savename;
        }
        return $data;
    }
}