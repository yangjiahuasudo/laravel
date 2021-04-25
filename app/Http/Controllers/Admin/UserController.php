<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //后台用户列表
    public function index()
    {
        $users = DB::table('user')->where('status',0)->get();
        return view('Admin.User.member-list', ['users' => $users]);
    }
    
     //修改用户信息
    public function edit($id)
    {
        $user = DB::table('user')->where('id',$id)->get();
        return view('Admin.User.member-edit',['user' => $user]);
    }
    
     //修改用户信息结束
    public function edit_over()
    {
        $id = $_POST['id'];
        $values = [
            'name'  => $_POST['name'],
            'sex'   => $_POST['sex'], 
            'phone' => $_POST['phone'],
            'addr'  => $_POST['addr'],
            'desc'  => $_POST['desc'],
        ];
        $res = DB::table('user') ->where('id', $id)->update($values);
        $result = ['code'=>0,'msg'=>'修改成功'];
        return $result;
    }
    
     //添加用户
    public function add()
    {
        return view('Admin.User.member-add');
    }
    
    //添加用户结束
    public function add_over()
    {
//        return ['code'=>1,'msg'=>'用户已存在'];
        $params = $_POST;
//        $params = json_encode($params);
//        $a = json_decode(file_get_contents("php://input"),true) or $params = $_REQUEST;
//        $a = file_get_contents("php://input");
//        file_put_contents('/tmp/aa.log', $params."\n",FILE_APPEND|LOCK_EX);
        $user_info = DB::table('user')->where('phone',$params['phone'])->get();
//        dd($user_info);
        if($user_info->isEmpty()){
            $value = [  'name'  => $params['name'],
                        'sex'   => $params['sex'], 
                        'phone' => $params['phone'],
                        'addr'  => $params['addr'],
                        'status'=> '0',
                        'create_time'=>date('Y-m-d H:i:s', time()),
                        'desc'  => $params['desc'],
                        'password'=> $params['password']
                    ];
            $result = DB::table('user')->insert($value);
            $result = ['code'=>0,'msg'=>'添加成功'];
        }else{
            $result = ['code'=>1,'msg'=>'用户已存在'];
        }
        return $result;
        
    }
    
     //修改用户密码
    public function password($id)
    {
        $user = DB::table('user')->where('id',$id)->get();
        return view('Admin.User.member-password', ['user' => $user]);
    }
    
     //修改用户密码
    public function password_over()
    {
        $id = $_POST['id'];
        $values = [
            'password'  => $_POST['password'],
        ];
        $res = DB::table('user') ->where('id', $id)->update($values);
        $result = ['code'=>0,'msg'=>'修改成功'];
        return $result;
    }
    
    //删除用户
    public function del()
    {
        $res = DB::table('user') ->where('id', $_POST['id'])->update(['status'=>1]);
        $result = ['code'=>0,'msg'=>'删除成功'];
        return $result;
    }
    
    //***************************************************************************************
    
    //删除用户列表
    public function list_del()
    {
        $users = DB::table('user')->where('status',1)->get();
        return view('Admin.User.member-list-del', ['users' => $users]);
    }
    
    //删除用户列表--恢复用户
    public function list_del_reset()
    {
        $res = DB::table('user') ->where('id', $_POST['id'])->update(['status'=>0]);
        $result = ['code'=>0,'msg'=>'恢复成功'];
        return $result;
    }
    
}
