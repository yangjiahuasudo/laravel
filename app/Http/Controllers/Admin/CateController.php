<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    //类别管理
    public function index()
    {
        $cates = DB::table('cate')->where('status',0)->get()->toArray();
        
        array_multisort(array_column($cates, 'weight'),SORT_DESC,$cates);
        return view('Admin.Cate.cate', ['cates' => $cates]);
    }
    
     //添加分类
    public function add()
    {
        return view('Admin.Cate.cate-add');
    }
    
    //添加分类结束
    public function add_over()
    {
        $params = $_POST;
        $value = [  
            'name'  => $params['name'],
            'weight'   => $params['weight'], 
            'status'   => 0, 
                ];
        $res = DB::table('cate')->insert($value);
        if($res){
            $result = ['code'=>0,'msg'=>'添加成功'];
        }else{
            $result = ['code'=>1,'msg'=>'添加失败，请重试'];
        }
        return $result;
    }
    
    //修改分类信息
    public function edit($id)
    {
        $cate = DB::table('cate')->where('id',$id)->get();
        return view('Admin.Cate.cate-edit',['cate' => $cate]);
    }
    
     //修改分类信息结束
    public function edit_over()
    {
        $id = $_POST['id'];
        $values = [
            'name'  => $_POST['name'],
        ];
        $res = DB::table('cate') ->where('id', $id)->update($values);
        if($res){
            $result = ['code'=>0,'msg'=>'修改成功'];
        }else{
            $result = ['code'=>1,'msg'=>'修改失败，请重试'];
        }
        return $result;
    }
    
    //修改分类信息
    public function weight($id)
    {
        $cate = DB::table('cate')->where('id',$id)->get();
        return view('Admin.Cate.cate-weight',['cate' => $cate]);
    }
    
     //修改分类信息结束
    public function weight_over()
    {
        $id = $_POST['id'];
        $values = [
            'weight'  => $_POST['weight'],
        ];
        $res = DB::table('cate') ->where('id', $id)->update($values);
        if($res){
            $result = ['code'=>0,'msg'=>'修改成功'];
        }else{
            $result = ['code'=>1,'msg'=>'修改失败，请重试'];
        }
        return $result;
    }
    
    //删除分类
    public function del()
    {
        $res = DB::table('cate') ->where('id', $_POST['id'])->update(['status'=>1]);
        $result = ['code'=>0,'msg'=>'删除成功'];
        return $result;
    }
    
    //***************************************************************************************
    
    //删除分类列表
    public function list_del()
    {
        $cates = DB::table('cate')->where('status',1)->get();
        return view('Admin.Cate.cate-list-del', ['cates' => $cates]);
    }
    
    //删除用户列表--恢复用户
    public function list_del_reset()
    {
        $res = DB::table('cate') ->where('id', $_POST['id'])->update(['status'=>0]);
        $result = ['code'=>0,'msg'=>'恢复成功'];
        return $result;
    }
}
