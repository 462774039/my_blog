<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //获取所有用户（不包括管理员）
    public function getAllUser()
    {
        return $this->where('isAdmin', 0)->get();
    }

    //获取所有关键字用户I（不包括管理员）
    public function getKeyUser()
    {
        return;
    }

    //获取指定用户
    public function getUser($id)
    {
        return $this->find($id);
    }

    //删除指定用户
    public function deleteUser($id)
    {
        $user = $this->find($id);
        $user->delete($id);
    }
}
