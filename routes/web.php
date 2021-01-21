<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::any('/test', 'Test\TestController@index');
Route::any('/test2', 'Test\TestController@index2');
    
Route::any('/', 'Index\IndexController@index');

Route::any('/goods/list/{id}', 'Index\IndexController@list');
Route::any('/goods/detail/{id}', 'Index\IndexController@detail');


Route::any('/cates/all', 'Index\IndexController@cates_all');
Route::any('/list/all', 'Index\IndexController@list_all');



Route::group(['prefix'=>'admin','namespace'=>'Admin'],function() {
    Route::any('index', 'IndexController@index');//后台首页
    Route::any('welcome', 'IndexController@welcome');//后台首页
    
    Route::any('member-list', 'UserController@index');//用户列表
    
    Route::any('member-add', 'UserController@add');//添加用户
    Route::any('member-add-over', 'UserController@add_over');//添加用户结束
    
    Route::any('member-edit/{id}', 'UserController@edit');//修改用户
    Route::any('member-edit-over', 'UserController@edit_over');//修改用户结束
    
    Route::any('member-password/{id}', 'UserController@password');//修改用户密码
    Route::any('member-password-over', 'UserController@password_over');//修改用户密码
    
    Route::any('member-del', 'UserController@del');//删除用户
    
    Route::any('member-list-del', 'UserController@list_del');//删除用户列表
    Route::any('member-list-del-reset', 'UserController@list_del_reset');//恢复用户
    
    //******************************************************************
    
    Route::any('cate', 'CateController@index');//类别管理

    Route::any('cate-add', 'CateController@add');//添加类别
    Route::any('cate-add-over', 'CateController@add_over');//添加类别结束
    
    Route::any('cate-edit/{id}', 'CateController@edit');//修改类别
    Route::any('cate-edit-over', 'CateController@edit_over');//修改类别结束
    
    Route::any('cate-weight/{id}', 'CateController@weight');//修改权重
    Route::any('cate-weight-over', 'CateController@weight_over');//修改权重结束
    
    Route::any('cate-del', 'CateController@del');//删除权限
    
    Route::any('cate-list-del', 'CateController@list_del');//删除权限列表
    Route::any('cate-list-del-reset', 'CateController@list_del_reset');//恢复权限
    
    //******************************************************************
    
    Route::any('goods-list', 'GoodsController@index');//商品列表
    
    Route::any('goods-add', 'GoodsController@add');//添加商品
    Route::any('goods/picture/upload_first', 'GoodsController@goods_picture_upload_first');//上传首图
    Route::any('goods/picture/upload', 'GoodsController@goods_picture_upload');//上传图片
    Route::any('goods-add-over', 'GoodsController@add_over');//添加商品结束
    
    Route::any('goods-edit/{id}', 'GoodsController@edit');//修改商品信息
    Route::any('goods/picture/upload_del', 'GoodsController@goods_picture_upload_del');//上传首图并删除旧图
    Route::any('goods-edit-over', 'GoodsController@edit_over');//修改商品信息结束
    
    Route::any('goods-pic-edit/{id}', 'GoodsController@pic_edit');//修改商品详情图片
    Route::any('goods/picture/upload_pic_del', 'GoodsController@goods_picture_upload_pic_del');//上传首图并删除旧图
    
    Route::any('goods-online', 'GoodsController@goods_online');//商品上线
    Route::any('goods-downline', 'GoodsController@goods_downline');//商品下线
    //******************************************************************
    
    Route::any('lunbo-list', 'LunboController@index');//轮播列表
    Route::any('lunbo-list-down', 'LunboController@index_down');//轮播列表
    
    Route::any('lunbo-add', 'LunboController@add');//添加轮播图
    Route::any('lunbo/picture/upload', 'LunboController@lunbo_picture_upload');//上传图片
    Route::any('lunbo-add-over', 'LunboController@add_over');//添加轮播结束
    
    Route::any('lunbo-edit/{id}', 'LunboController@edit');//修改轮播
    Route::any('lunbo/picture/upload_del', 'LunboController@lunbo_picture_upload_del');//上传图片
    Route::any('lunbo-edit-over', 'LunboController@edit_over');//修改轮播结束
    
    Route::any('lunbo-down', 'LunboController@lunbo_down');//轮播下线
    Route::any('lunbo-up', 'LunboController@lunbo_up');//轮播下线

    //******************************************************************
    
    Route::any('floor-list', 'FloorController@index');//楼层列表
    Route::any('floor-list-down', 'FloorController@index_down');//楼层列表
    
    Route::any('floor-add', 'FloorController@add');//添加楼层图
    Route::any('floor/picture/upload', 'FloorController@floor_picture_upload');//上传图片
    Route::any('floor-add-over', 'FloorController@add_over');//添加楼层结束
    
    Route::any('floor-edit/{id}', 'FloorController@edit');//修改楼层
    Route::any('floor/picture/upload_del', 'FloorController@floor_picture_upload_del');//上传图片
    Route::any('floor-edit-over', 'FloorController@edit_over');//修改楼层结束
    
    Route::any('floor-down', 'FloorController@floor_down');//楼层下线
    Route::any('floor-up', 'FloorController@floor_up');//楼层下线
    
    //******************************************************************
    Route::any('goods-cate/{id}', 'GoodsCateController@index');//商品分类
    
    //************************ 首 页 管 理******************************************
    
    Route::any('manager/1', 'ManagerController@first_list');//楼层一
    Route::any('manager/first-add', 'ManagerController@first_add');//添加页面
    Route::any('manager/first-add-over', 'ManagerController@first_add_over');//添加结束
    Route::any('manager/first-edit/{id}', 'ManagerController@first_edit');//修改页面
    Route::any('manager/first-edit-over', 'ManagerController@first_edit_over');//修改页面
    Route::any('manager/first-down', 'ManagerController@first_down');//下线
    Route::any('manager/first-up', 'ManagerController@first_up');//上线

    Route::any('manager/2', 'ManagerController@second_list');//楼层二
    Route::any('manager/second-online', 'ManagerController@second_online');//店长推荐列表--上线
    Route::any('manager/second-downline', 'ManagerController@second_downline');//店长推荐列表---下线


    Route::any('manager/3', 'ManagerController@third_list');//楼层三
    Route::any('manager/third-edit/{id}', 'ManagerController@third_edit');//分类信息--修改
    Route::any('manager/third-upload_pic_del', 'ManagerController@third_upload_pic_del');//上传首图并删除旧图

    Route::any('manager/4', 'ManagerController@fourth_list');//楼层四
    Route::any('manager/fourth_online', 'ManagerController@fourth_online');//店长推荐列表--上线
    Route::any('manager/fourth_downline', 'ManagerController@fourth_downline');//店长推荐列表---下线

//====================================
    Route::any('manager-index', 'ManagerController@index');//店长推荐列表
  

    Route::any('store_selection', 'ManagerController@store_selection');//店内精选列表
    Route::any('selections_status_online', 'ManagerController@selections_status_online');//店长推荐列表--上线
    Route::any('selections_status_downline', 'ManagerController@selections_status_downline');//店长推荐列表---下线
});