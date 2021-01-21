<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\lunbo;
use Illuminate\Support\Facades\DB;

use App\Model\admin\goods_detail;
use App\Model\admin\cate;
use App\Model\admin\goods_detail_pic;
use App\Model\admin\floor;
use App\Model\admin\first_floor;

class IndexController extends Controller
{
    public function index() {
        
        //轮播管理
        $lunbos = lunbo::where('status',0)->get()->toArray();

        //查看楼层---没开的楼层隐藏
        $floors = floor::where('status',1)->get()->toArray();

        $new_floor = [];
        foreach ($floors as $kf => $floor) {
            $new_floor[$floor['id']] = $floor;
        }

        //一楼
        $first_floor = DB::table('first_floor')->where('status','1')->get()->toArray();

        // dd($first_floor);



//         $cates = DB::table('cate')->where('status',0)->get()->toArray();
         
        
        //店长推荐
        $second_floor = goods_detail::get()->where('manager_status','=','1')->toArray();
        // dd($recommends_goods);
        // if(!$recommends_goods){
        //     $recommends_goods = goods_detail::orderBy('id','desc')->limit(1)->get()->toArray();
        // }

        //分类信息
        $cates = cate::all()->toArray();
        //首页不展示没有图片的分类信息
        foreach ($cates as $k => $cate) {
            if(empty($cate['pic'])){
                unset($cates[$k]);
            }
        }
        // dd($cates);
        //店内精选
        $fourth_floors = goods_detail::get()->where('selection_status','=','1')->toArray();
        if(!$fourth_floors){
            $fourth_floors = goods_detail::orderBy('id','desc')->limit(2)->get()->toArray();
        }
        foreach ($fourth_floors as $key => $value) {
            if($key%2==0){
                $fourth_floors[$key]['location'] = 'left';
            }else{
                $fourth_floors[$key]['location'] = 'right';
            }
        }
    //    dd($new_floor);
        //http://106.13.224.218/storage/admin/lunbo/20200224062645_5e536ca51384d.png
        return view('Index.index' ,
                [
                    'lunbos'=>$lunbos,
                    'floor' => $new_floor,//楼层开关
                    'first_floor'=>$first_floor,
                    'second_floor'=>$second_floor,
                    'cates'=>$cates,
                    'fourth_floors'=>$fourth_floors,
                ]);
    }


    //列表页
    public function list($id) {
        
        $goods_list = goods_detail::where('goods_cate',$id)->get()->toArray();
        $cates = cate::all()->toArray();

        foreach ($cates as $cate) {
            if($cate['id'] == $id){
                $cate_name = $cate['name'];
            }
        }

        //把类别id变为汉字
        foreach ($goods_list as $key => $value) {
            foreach ($cates as $k2 => $v2) {
                if($v2['id'] == (int)$value['goods_cate']){
                    $goods_list[$key]['goods_cate'] = $v2['name'];
                }
                if($value['goods_cate'] == '-1'){
                    $goods_list[$key]['goods_cate'] = '其它';
                }
            }
        }

        // dd($cates);
        
        return view('Index.list', ['goods_list' => $goods_list,'cate_name'=>$cate_name]);
        
    }

    //详情页
    public function detail($id) {
        
        $goods_detail = goods_detail::where('id',$id)->get()->toArray();
        $cates = cate::all()->toArray();

        //把类别id变为汉字
        foreach ($goods_detail as $key => $value) {
            foreach ($cates as $k2 => $v2) {
                if($v2['id'] == (int)$value['goods_cate']){
                    $goods_detail[$key]['goods_cate'] = $v2['name'];
                }
                if($value['goods_cate'] == '-1'){
                    $goods_detail[$key]['goods_cate'] = '其它';
                }
            }
        }

        $goods_detail_pic = goods_detail_pic::where('goods_detail_id',$id)->get()->toArray();

        // dd($goods_detail_pic);
        
        return view('Index.detail', ['detail' => $goods_detail,'detail_pic'=>$goods_detail_pic]);
        
    }

    //全部分类
    public function cates_all() {

        $cates = cate::all()->toArray();
        //首页不展示没有图片的分类信息
        foreach ($cates as $k => $cate) {
            if(empty($cate['pic'])){
                unset($cates[$k]);
            }
        }

        // dd($cates);
        return view('Index.cates_all', ['cates' => $cates]);
    }

    //全部商品
    public function list_all() {

        $goods_list = goods_detail::where('status',0)->get()->toArray();
        $cates = cate::all()->toArray();

        //把类别id变为汉字
        foreach ($goods_list as $key => $value) {
            foreach ($cates as $k2 => $v2) {
                if($v2['id'] == (int)$value['goods_cate']){
                    $goods_list[$key]['goods_cate'] = $v2['name'];
                }
                if($value['goods_cate'] == '-1'){
                    $goods_list[$key]['goods_cate'] = '其它';
                }
            }
        }

        // dd($goods_list);
        return view('Index.list_all', ['goods_list' => $goods_list]);
    }


}

