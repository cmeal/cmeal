<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/2/1
 * Time: 15:49
 */
namespace Canmou\Controller;
use Canmou\Controller\AdminController;
class CateController extends AdminController{
    public function index(){
        $cate = D("Cate");
        $cateTree = $cate->getCategoryTree();
        $this->assign(
            array(
                "cateList"=>$cateTree,
                'action'=>'product_cate'
            )
        );
        $this->display('index');
    }

    public function add(){
        $cate = D("Cate");
        if(IS_POST){
            $data['parent_id'] = $_POST['parent_id'];
            $data['name'] = $_POST['name'];
            $data['desc'] = $_POST['desc'];
            $data['status'] = $_POST['status'];
            $rs = $cate->create();
            if($rs){
                $cate->add();
                setMessage('添加成功');
            }else{
                setMessage($cate->getError(),'error');
            }
            redirect('/canmou/cate/index');
        }
        $parent_cates = $cate->where('parent_id=0')->select();
        $this->assign(
            array(
                "parent_cates"=>$parent_cates,
                'action'=>'product_cate',
            )
        );
        $this->display('edit');
    }

    public function edit(){
        $cate_model = D("Cate");
        $id = $_GET['id'];
        if(empty($id)|| !is_numeric($id)){
            setMessage('不存在此类目','error');
            redirect('/canmou/cate/index');
        }
        if(IS_POST){
            $data['parent_id'] = $_POST['parent_id'];
            $data['name'] = $_POST['name'];
            $data['desc'] = $_POST['desc'];
            $data['status'] = $_POST['status'];
            $data['cid'] = $id;
            $rs = $cate_model->create($data);
            if($rs){
                $cate_model->save($data);
                setMessage('保存成功');
            }else{
                setMessage($cate_model->getError(),'error');
            }
            redirect('/canmou/cate/index');
        }
        $parent_cates = $cate_model->where('parent_id=0')->select();
        $cate = $cate_model->where('cid='.$id)->find();
        if($cate['parent_id']!=0){
            foreach($parent_cates as $key => $value){
                if($value['cid']==$cate['parent_id']){
                    $cate['parent_name']=$value['name'];
                    unset($parent_cates[$key]);
                }
            }
        }
//        var_dump($parent_cates);
//        var_dump($cate);
//exit;
        $this->assign(
            array(
                'parent_cates'=>$parent_cates,
                'cate'=>$cate,
                'action'=>'product_cate',
            )
        );
        $this->display('edit');
    }

    /**
     * 保存类目的顺序以及父子关系。
     * 每次ajax post都要更新所有的记录，效率很低，耗时长，并且thinkphp没有批量更新的方法。
     */
    public function ajaxorder(){
        if(IS_AJAX){
            $en_data = json_decode($_POST['list']);
            $cate = D("Cate");
            $rs = $cate->update($en_data);
        }
        $this->ajaxReturn(true,'json');
    }

    /**
     * 删除类目。
     * 该方法最好不要做明确的显式调用。
     * 删除一个类目，要把子类也要删除，商品的分类也要设置（可以用外键来做到）
     */
    public function delete(){

    }
}