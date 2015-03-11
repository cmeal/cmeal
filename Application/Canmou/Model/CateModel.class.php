<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/22
 * Time: 16:14
 */
namespace Canmou\Model;
use Think\Model;
class CateModel extends Model {

    protected $tableName = 'categories';
    /* 自动验证规则 */
    //当create无参数时，验证的是表单的信息，所以字段名与表单名相同
    //当create传入参数时，验证参数的信息
    //调用d方法，create返回成功的信息时，是根据表结构生成数据，表结构中不存在的字段，返回数据中不包含，但是，如果要验证信息的话，还是会自动验证信息的
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
        //0 存在字段就验证（默认）
        //1 必须验证
        //2 值不为空的时候验证
        array('name', 'require', '填写类目名',1),
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
        return $data;
    }

    public function edit_cate($cid){
        $cates = $this->select();
        foreach($cates as $key => $value){
            if($value['cid']==$cid){
                unset($cates[$key]);
            }
        }

    }
//获取index页面的类目分类树
    public function getCategoryTree(){
        $tree=array();
        $cates = $this->order('sort_weight')->select();
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
//        foreach($tree as $value){
//            foreach($value['children'] as $v){
//                var_dump($v);
//            }
//        }
        return $tree;
    }

    /**
     * 更新分类，保存分类顺序
     * @param $data
     * @return array
     */
    public function update($data){
        $res = $this->_getCategoriesOrder($data);
        $weight = 0;
        $reda=array();
        foreach($res as $key=>$value){
            $save_data['cid']=$key;
            $save_data['parent_id']=$value;
            $save_data['sort_weight']=$weight;
            $weight++;
            $reda[] = $save_data;
            $this->save($save_data);
        }
        return $reda;
    }

    /**
     *转换成类目数组
     * @param $list
     * @param int $parentCid
     * @return array
     */
    private function _getCategoriesOrder($list, $parentCid = 0){
        $data=array();
        foreach($list as $key=>$value){
            $pid = $value->id;
            $data[$pid]=$parentCid;
            if($value->children){
                $child_data = $this->_getCategoriesOrder($value->children,$pid);
                $data+=$child_data;
            }
        }
        return $data;
    }
}