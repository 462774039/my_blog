<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //
    use SoftDeletes;
    protected $table = 'blog';
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function classify()
    {
        return $this->belongsTo('App\Classify','class_id');
    }

    public function getBlog($blogID)
    {
        $blog = $this->find($blogID);
        $blog->user;
        $blog->classify;
        return $blog;
    }

    //删除指定ID的博客
    public function deleteBlog($blogID)
    {
        $blog = $this->find($blogID);
        $blog->delete();
    }

    //获取全部博客
    public function getBlogAll()
    {
        return $this->all();
    }

    //获取指定分类的博客
    public function getClassBlogAll($classID)
    {
        return $this->where('class_id', $classID)->get();
    }
/*
    //获取指定id博客的数据(不附带作者名和分类名)
    public function getBlog($blogID)
    {
        return $this->find($blogID);
    }
*/
}
