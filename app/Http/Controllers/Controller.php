<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $blogC = new \App\Blog();

        $classC = new \App\Classify();
        $class = $classC->getAllClass();
        $classID = Request::get('class_id');
        if($classID){
            $blog = $blogC->getClassBlogAll($classID);
        }else{
            $blog = $blogC->getBlogAll();
        }
        $data = [
            'blog' => $blog,
            'class' => $class
        ];
        return view('index', compact('data'));
    }
}
