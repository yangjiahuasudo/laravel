<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class floor extends Model
{
    //与模型关联的表名
    protected $table = 'floor';
     //重定义主键
    protected $primaryKey = 'id';
    //指示是否自动维护时间戳
    public $timestamps = false;
}
