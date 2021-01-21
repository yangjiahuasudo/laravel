<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\goods_detail;
use App\Model\admin\cate;

class GoodsCateController extends Controller
{
    //商品分类页面
    public function index($id)
    {
        $goods_details = goods_detail::where('goods_cate',$id)->get()->toArray();
        $cates = cate::all()->toArray();

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
        return view('Admin.GoodsCate.goods-list', ['goods_details' => $goods_details]);
    }
}
