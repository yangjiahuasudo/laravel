<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //后台首页
    public function index()
    {
        $cates = DB::table('cate')->where('status',0)->get()->toArray();
        //按照权重排序
        array_multisort(array_column($cates, 'weight'),SORT_DESC,$cates);

        //楼层
        $floors = DB::table('floor')->where('status',1)->get()->toArray();
        // unset($floors['0']);
        // dd($floors);
        return view('Admin.index', ['cates' => $cates,'floors'=>$floors]);
    }
    
    //后台欢迎页面
    public function welcome()
    {
        
        return view('Admin.welcome');
    }
    
    
}
