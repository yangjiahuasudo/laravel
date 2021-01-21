<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class goods_detail extends Model
{
    //与模型关联的表名
    protected $table = 'goods_detail';
     //重定义主键
    protected $primaryKey = 'id';
    //指示是否自动维护时间戳
    public $timestamps = false;
    
    //
}