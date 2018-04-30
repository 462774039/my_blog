<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discuss extends Model
{
    //
    use SoftDeletes;
    protected $table = 'discuss';
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //获取某条博客的所有评论(包括评论用户名)
    public function getAllDiscuss($blogID)
    {
        $discuss = $this->where('blog_id', $blogID)->get();
        foreach($discuss as $data){
            $data->user;
        }
        return $discuss;
    }

    public function deleteDiscuss($discussID)
    {
        $discuss = $this->find($discussID);
        $discuss->delete();
    }
}
