<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classify extends Model
{
    //
    use SoftDeletes;
    protected $table = 'class';
    protected $dates = ['deleted_at'];

    //获取全部分类
    public function getAllClass()
    {
        return $this->all();
    }

    //获取指定id分类
    public function getClass($classID)
    {
        return $this->find($classID);
    }

    //删除指定分类
    public function deleteClass($classID)
    {
        $class = $this->find($classID);
        $class->delete();
    }
}
