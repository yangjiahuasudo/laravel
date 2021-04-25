<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\admin\floor;

class FloorController extends Controller
{

    //添加楼层
    public function add()
    {
//        $cates = DB::table('')->where('status',0)->get()->toArray();
        //按照权重排序
//        array_multisort(array_column($cates, 'weight'),SORT_DESC,$cates);
        return view('Admin.Floor.floor-add');
    }

    //**********************************上传轮播图片*****************************************************************
    
    //上传轮播图片
    public function floor_picture_upload(request $request){
        
        //return ['code'=>0,'msg'=>'http://106.13.224.218/storage/admin/goods/20200215060756_5e478abc08baf.png'];
        
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
        $path = 'admin/floor/'.$filename;
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

    //添加商品结束
    public function add_over(){
        $input = json_decode(file_get_contents('php://input'), true);
        
        // dd($input);
        $value = [
            'name' => $input['name'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'pic' => isset($input['pic'])?$input['pic']:'',
            'status' => 2,//默认下线状态
        ];
        $result = DB::table('floor')->insert($value);

        if($result){
            return ['code'=>0,'msg'=>'添加成功'];
        }else{
            return ['code'=>1,'msg'=>'添加失败'];
        }
        
    }

    
    //轮播列表
    public function index()
    {
        //  $floors = floor::where('status','1')->get()->toArray();
         $floors =  floor::get()->toArray();
        //  dd($floors);
        return view('Admin.Floor.floor-list',['floors'=>$floors]);
    }
    

    
    //修改轮播信息
    public function edit($id)
    {
        $lunbo = floor::where('id',$id)->get()->toArray();
        return view('Admin.Floor.floor-edit', ['lunbo' => $lunbo]);
    } 
    
    //上传轮播图片并且删除原始图片
    public function floor_picture_upload_del(request $request){
        
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
        $path = 'admin/floor/'.$filename;
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
            $path_old = 'admin/lunbo/'.$pic_url;
            $bool = \Storage::disk('public')->delete($path_old);
            if(!$bool){
//                return ['code'=>1,'msg'=>'删除文件失败'];
            }
        }
        
        return ['code'=>0,'msg'=>'http://'.$_SERVER['HTTP_HOST'].'/storage/'.$path];
    }
    
    //修改轮播信息结束
    public function edit_over()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        // dd($input);
        $id = $input['id'];
        if(!isset($input['pic'])){
            $values = [
                'name'  => $input['name'],
                'title'  => $input['title'],
                'desc'  => $input['desc'],
            ];
        }else{
            $values = [
                'name'  => $input['name'],
                'title'  => $input['title'],
                'desc'  => $input['desc'],
                'pic'  => $input['pic'],
            ];
        }

        
         $Floor = Floor::where('id',$id)->update($values);
         if($Floor){
            $result = ['code'=>0,'msg'=>'修改成功'];
         }else{
             $result = ['code'=>1,'msg'=>'修改失败，请重试'];
         }
//        $res = DB::table('goods_detail') ->where('id', $id)->update($values);
        return $result;
    }


    //***************************************************************************************************

    //下线
    public function floor_down()
    {
        $res = Floor::where('id',$_REQUEST['id'])->update(['status'=>'2']);
        if($res){
            $result = ['code'=>0,'msg'=>'隐藏成功'];
        }else{
            $result = ['code'=>1,'msg'=>'隐藏失败，请重试'];
        }
        return $result;
    }
    
    //轮播上线
    public function floor_up()
    {
        $res = Floor::where('id',$_REQUEST['id'])->update(['status'=>'1']);
        if($res){
            $result = ['code'=>0,'msg'=>'隐藏成功'];
        }else{
            $result = ['code'=>1,'msg'=>'隐藏失败，请重试'];
        }
        return $result;
    }
    

    // //轮播列表--下线
    // public function index_down()
    // {
    //      $lunbos = lunbo::where('status',1)->get()->toArray();
    //     return view('Admin.Lunbo.lunbo-list-down',['lunbos'=>$lunbos]);
    // }
    

    
    

    


    
    
    
    
}
