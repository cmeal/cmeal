<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/24
 * Time: 22:12
 */
namespace Canmou\Controller;
use Canmou\Controller\AdminController;

class ProductController extends AdminController{
    public function index(){
//        $Product = D("Product");
//        if($Product->img()){
//            echo $Product->getError();
//        }
//        exit;
//        $rs = $Product->table('pro_img')->select();
//        var_dump($rs);
//        exit;
        $products = M('Products')->select();

        $this->assign(
            array(
                'products'=>$products,
                "action"=>"product_list",
                'count'=>count($products),
            )
        );
        $this->display('index');
    }
    public function add(){
        //添加产品
        //保存数据，跳转
        if(IS_POST){
            //TODO save success redirect index
            $files = $_POST['files'];//only use post method,String type
            $post_imgs = json_decode($files);//object
            $save_imgs = implode(";",$post_imgs);
            $main_img=I('cover');
            $data['image_path']=$save_imgs;
            $data['main_image']=$main_img;

            $data['title']=$_POST['title'];
            $data['cid']=$_POST['cid'];
            $data['shop_id']=$_POST['shop_id'];
            $data['cost']=$_POST['cost'];
            $data['sell_price']=$_POST['sell_price'];
            $data['vip_price']=$_POST['vip_price'];
            $data['status']=$_POST['status'];
            $data['body']=$_POST['body'];
            $product_model = D("Product");
            if(!$product_model->create($data)){
                setMessage($product_model->getError(),'error');
                redirect('/canmou/product/add');
            }else{
                $data['created']=time();
                $data['updated']=time();
                setMessage("保存成功",'success');
            }
            redirect('/canmou/product/index');
        }else{
            //展示添加产品的页面
            $Product = D("Product");
            $cates  =$Product->cates();
            $shops = $Product->shop();
            $this->assign(
                array(
                    'cates'=>$cates,
                    'shops'=>$shops,
                    'size'=>$Product->size(),
                    "pro_type"=>"add",
                    "action"=>"product_list",
                )
            );
            $this->display('edit');
        }
    }
    public function edit(){
        $id = $_GET['id'];
        if(!isset($id) ||! is_numeric($id)){
            //TODO redirect
            setMessage("商品信息错误",'error');
            redirect('/canmou/product/index');
        }
        $Product = D("Product");
        if(IS_POST){
            //TODO save success redirect index
            $files = $_POST['files'];//only use post method,String type
            $post_imgs = json_decode($files);//object
            $main_img=$_POST['cover'];
            //没有上传图片
            if(!is_array($post_imgs) || count($post_imgs)==0){
                echo "files is  null";
            }
            //没有设置主图
            if(empty($main_img)){
                $main_img=$post_imgs[0];
            }
            $save_imgs = implode(";",$post_imgs);
            $data['image_path']=$save_imgs;
            $data['main_image']=$main_img;
            $data['title']=$_POST['title'];
            $data['body']=$_POST['body'];
            $data['status']=$_POST['status'];
            $data['cost']=$_POST['cost'];
            $data['pro_size']=$_POST['pro_size'];
            $data['vip_price']=$_POST['vip_price'];
            $data['sell_price']=$_POST['sell_price'];

            $data['shop_id']=$_POST['shop_id'];
            $data['cid']=$_POST['cid'];

            $data['pid']=$id;
            if(!$Product->create($data)){
                setMessage($Product->getError(),'error');
                redirect('/canmou/product/edit?id='.$id);
            }else{
                $data['updated']=time();
                setMessage("产品信息保存成功");
                $Product->save($data);
            }
            redirect('/canmou/product/index');
        }else{
            //TODO select
            $cates  =$Product->cates();
            $shops = $Product->shop();
            $product = $Product->getProduct($id,$cates,$shops);

            $this->assign(
                array(
                    'cates'=>$Product->cates($cates,$product['cid']),
                    'shops'=>$Product->shop($shops,$product['shop_id']),
                    'size'=>$Product->size($product['pro_size']),
                    'product'=>$product,
                )
            );
            $this->display('edit');
        }

    }

    /**
     * 商品上传图片保存
     */
    public  function fileupload(){
        if(!IS_POST){
            return;
        }
        //TODO 判断图片是否在文件中存在
        if(isset($_FILES['files']) && is_array($_FILES['files'])){
            $set = array();
            $root = $_SERVER['DOCUMENT_ROOT'];//F:/wamp/www/tp_ubive
            $uploadPath = $root.'/Public/upload/pro_img/';//文件保存路径
            foreach($_FILES as $key => $value){
                for ($i = 0; $i < count($value['tmp_name']); $i++) {
                    $type = img_type($value["type"][$i]);
                    $savename = 'pro_'.time().'_'.$i.$type;//文件名
                    $fileContent = file_get_contents($value['tmp_name'][$i]);
                    $file = $uploadPath.$savename;//完整的路径
                    file_put_contents($file,$fileContent);
//                    write_file($savename,$fileContent);
//                    $tmp = fopen($value['tmp_name'][$i], "rb");//打开上传的临时文件
//                    $tmpbuff = fread($tmp, $value["size"][$i]);//读取临时文件
//                    $file = $uploadPath.$savename;//完整的路径
//                    $savefile = fopen($file,'w');//打开，准备写目标文件
//                    $rs = fwrite($savefile,$tmpbuff);

                    $set[$value['name'][$i]] =$savename;
                }
            }

        }
        $this->ajaxReturn(json_encode($set),'json');

//        $type = $_FILES["file"]["type"];
//        //判断上传文件的类型
//        if($type=='image/jpg'|| $type=='image/jpeg'){
//            $filetype='.jpg';
//        }elseif($type=='image/png'){
//            $filetype='.png';
//        }else{
//            return;
//        }
//        $savename = $uploadPath.time().$filetype;
//        $tmp = fopen($_FILES["file"]["tmp_name"], "rb");//打开上传的临时文件
//        $tmpbuff = fread($tmp, $_FILES["file"]["size"]);//读取临时文件
//        $savefile = fopen($savename,'w');//打开，准备写目标文件
//        fwrite($savefile,$tmpbuff);

    }

}