<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\admin\goods_detail;
use App\Model\admin\cate;
use App\Model\admin\goods_detail_pic;

class GoodsController extends Controller
{
    //商品列表
    public function index()
    {
//        $goods_details = goods_detail::all()->toArray();
//        dd($goods_details);
//        $cates = DB::table('goods_detail')->get()->toArray();
//        $goods_details = goods_detail::find(1)->roles()->orderBy('id')->get();
//        dd($goods_details);
        $goods_details = DB::table('goods_detail')->orderBy('status','asc')->get()->map(function ($value) {
            return (array)$value;
        })->toArray();
//      echo $goods_details['1']['goods_name'];
//          $goods_details = DB::table('goods_detail')->orderBy('status','asc')->get()->toArray();
//        dd($goods_details);
        $cates = cate::all()->toArray();
//        dd($cates);
        //把类别id变为汉字
        foreach ($goods_details as $key => $value) {
            foreach ($cates as $k2 => $v2) {
                if($v2['id'] == (int)$value['goods_cate']){
                    $goods_details[$key]['goods_cate'] = $v2['name'];
                }
                if($value['goods_cate'] == '-1'){
                    $goods_details[$key]['goods_cate'] = '其它';
                }
            }
        }
        return view('Admin.Goods.goods-list', ['goods_details' => $goods_details]);
    }
    
    //************************************************修改商品详情**************************************
    //修改商品信息
    public function edit($id)
    {
        $goods_detail = goods_detail::where('id',$id)->get()->toArray();
        $cate_id = $goods_detail['0']['goods_cate'];
        
        //把类别id变为汉字
        $cates = cate::all()->toArray();
        foreach ($cates as $key => $val) {
            if($val['id'] == $cate_id){
                $goods_detail['0']['goods_cate'] = $val['name'];
            }
        }
        
        $goods_detail_pic = DB::table('goods_detail_pic')->where('goods_detail_id',$id)->get();
//        dd($cates);
        return view('Admin.Goods.goods-edit', ['goods_detail' => $goods_detail, 'goods_detail_pic'=>$goods_detail_pic, 'cates'=>$cates]);
    }
    
    //上传图片并且删除原始图片
    public function goods_picture_upload_del(request $request){
        
//        return ['code'=>1,'msg'=>'http://106.13.224.218/storage/admin/goods/20200215060756_5e478abc08baf.png'];
        
        $file = $request->file('file');
        
        if($file == null){
            return ['code'=>1,'msg'=>'没有上传任何图片文件'];
        }
        
        //获取文件后缀
        $ext = $file->getClientOriginalExtension();
        if(!in_array($ext, ['png','jpg','jpeg'])){
            return ['code'=>1,'msg'=>'只能上传 png | jpg 格式的图片'];
        }
        
        $realPath = $file->getRealPath();   //临时文件的绝对路径

        // 上传文件
        $filename = date('YmdHis').'_'.uniqid() . '.' . $ext;
        $path = 'admin/goods/'.$filename;
        // 使用我们新建的uploads本地存储空间（目录）
        //这里的uploads是配置文件的名称
        $bool = \Storage::disk('public')->put($path, file_get_contents($realPath));
         //判断是否创建成功
        if (!$bool)
        {
            return ['code'=>1,'msg'=>'上传图片失败'];
        }
        
        //删除原始图片
        $url = parse_url($_REQUEST['pic_old']);
        $pic_url = basename($url['path']);
        if(strlen($pic_url) > 10){
            $path_old = 'admin/goods/'.$pic_url;
            $bool = \Storage::disk('public')->delete($path_old);

            if(!$bool){
                return ['code'=>1,'msg'=>'删除文件失败'];
            }
        }
        
        return ['code'=>0,'msg'=>'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$path];
    }
    
     //修改商品信息结束
    public function edit_over()
    {
        
        $id = $_POST['id'];
        $values = [
            'goods_name'  => $_POST['goods_name'],
            'goods_cate'   => $_POST['goods_cate'], 
            'goods_price' => $_POST['goods_price'],
            'goods_desc'  => $_POST['goods_desc'],
        ];
        if(isset($_POST['goods_picture'])){
            $values['goods_picture'] = $_POST['goods_picture'];
        }
        
        $res = goods_detail::where('id',$id)->update($values);
        return  ['code'=>0,'msg'=>'修改成功'];
    }
    
    //**************************************修改商品详情图片*****************************************
    //修改商品信息
    public function pic_edit($id)
    {
        $goods_detail_pic = goods_detail_pic::where('goods_detail_id',$id)->get()->toArray();
        return view('Admin.Goods.goods-pic-edit', ['goods_detail_pic' => $goods_detail_pic]);
    }
    
    //上传图片并且删除原始图片
    public function goods_picture_upload_pic_del(request $request){
        
//        return ['code'=>1,'msg'=>'http://106.13.224.218/storage/admin/goods/20200215060756_5e478abc08baf.png'];
        
        $file = $request->file('file');
        if($file == null){
            return ['code'=>1,'msg'=>'没有上传任何图片文件'];
        }
        //获取文件后缀
        $ext = $file->getClientOriginalExtension();
        if(!in_array($ext, ['png','jpg','jpeg'])){
            return ['code'=>1,'msg'=>'只能上传 png | jpg 格式的图片'];
        }
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        // 上传文件
        $filename = date('YmdHis').'_'.uniqid() . '.' . $ext;
        $path = 'admin/goods/'.$filename;
        // 使用我们新建的uploads本地存储空间（目录）
        //这里的uploads是配置文件的名称
        $bool = \Storage::disk('public')->put($path, file_get_contents($realPath));
         //判断是否创建成功
        if (!$bool){
            return ['code'=>1,'msg'=>'上传图片失败'];
        }
        
        //删除原始图片
        $url = parse_url($_REQUEST['pic_old']);
        $pic_url = basename($url['path']);
        if(strlen($pic_url) > 10){
            $path_old = 'admin/goods/'.$pic_url;
            $bool = \Storage::disk('public')->delete($path_old);

            if(!$bool){
                return ['code'=>1,'msg'=>'删除文件失败'];
            }
        }
        
        $pic_url = 'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$path;
        $value = ['pic'.$_REQUEST['num']=>$pic_url];
        $res = goods_detail_pic::where('id',$_REQUEST['id'])->update($value);
        return  ['code'=>0,'msg'=>'修改成功'];
    }
    
    //***************************添加商品****************************
    //上传商品图片
    public function goods_picture_upload(request $request){
        
//        return ['code'=>0,'msg'=>'http://106.13.224.218/storage/admin/goods/20200215060756_5e478abc08baf.png'];
        $file = $request->file('file');
        if($file == null){
            return ['code'=>1,'msg'=>'没有上传任何图片文件'];
        }
        //获取文件后缀
        $ext = $file->getClientOriginalExtension();
        if(!in_array($ext, ['png','jpg','jpeg'])){
            return ['code'=>1,'msg'=>'只能上传 png | jpg 格式的图片'];
        }
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        // 上传文件
        $filename = date('YmdHis').'_'.uniqid() . '.' . $ext;
        $path = 'admin/goods/'.$filename;
        // 使用我们新建的uploads本地存储空间（目录）
        //这里的uploads是配置文件的名称
        $bool = \Storage::disk('public')->put($path, file_get_contents($realPath));
         //判断是否创建成功
        if (!$bool)
        {
            return ['code'=>1,'msg'=>'上传图片失败'];
        }
        return ['code'=>0,'msg'=>'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$path];
    }
    
    //添加商品信息
    public function add()
    {
        $cates = DB::table('cate')->where('status',0)->get()->toArray();
        //按照权重排序
        array_multisort(array_column($cates, 'weight'),SORT_DESC,$cates);
        return view('Admin.Goods.goods-add', ['cates' => $cates]);
    }
    
    //添加商品结束
    public function add_over()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        
        $value = [
            'goods_name' => $input['goods_name'],
            'goods_cate' => $input['goods_cate'],
            'goods_price' => $input['goods_price'],
            'goods_desc' => $input['goods_desc'],
            'goods_picture' => $input['goods_picture'],
            'status' => 0,
    	];
	$result_id = DB::table('goods_detail')->insertGetId($value);

        $goods_picture  = $input['goods_imgs'];
        
        foreach ($goods_picture as $key => $val) {
            $val_pic['pic'.((int)$key+1)] = $val;
        }

	$val_pic['goods_detail_id'] = $result_id;
        
	$result = DB::table('goods_detail_pic')->insert($val_pic);
        if($result){
            return ['code'=>0,'msg'=>'添加成功'];
        }else{
            return ['code'=>1,'msg'=>'添加失败'];
        }
        
    }
    
    //商品上线
    public function goods_online()
    {
        $res = goods_detail::where('id',$_REQUEST['id'])->update(['status'=>'0']);
        if($res){
            $result = ['code'=>0,'msg'=>'上线成功'];
        }else{
            $result = ['code'=>1,'msg'=>'上线失败，请重试'];
        }
        return $result;
    }
    
    //商品下线
    public function goods_downline()
    {
        $res = goods_detail::where('id',$_REQUEST['id'])->update(['status'=>'1']);
        if($res){
            $result = ['code'=>0,'msg'=>'下线成功'];
        }else{
            $result = ['code'=>1,'msg'=>'下线失败，请重试'];
        }
        return $result;
    }
}
