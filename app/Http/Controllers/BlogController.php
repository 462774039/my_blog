<?php

namespace App\Http\Controllers;

use App\Classify;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) {
            $classC = new \App\Classify();
            $class = $classC->getAllClass();
            return view('CreateBlog', compact('class'));
        }else{
            return '您没有操作权限';
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) {
            $title = $request->title;
            $body = $request->body;
            $classID = $request->class;
            $userID = Auth::id();

            $blogC = new \App\Blog();
            $blogC->title = $title;
            $blogC->body = $body;
            $blogC->class_id = $classID;
            $blogC->user_id = $userID;
            $blogC->save();
            echo "<script>alert(\"发布成功\")</script>";

            $classC = new \App\Classify();
            $class = $classC->getAllClass();
            $blog = $blogC->getBlogAll();
            $data = [
                'blog' => $blog,
                'class' => $class
            ];
            return view('index', compact('data'));
        }else{
            return '您没有操作权限';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogC = new \App\Blog();
        $blog = $blogC->getBlog($id);
        $discussC = new \App\Discuss();
        $discuss = $discussC->getAllDiscuss($id);
        $data = [
            'blog' => $blog,
            'discuss' => $discuss
        ];
        return view('BlogInfo', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) {
            $blogC = new \App\Blog();
            $classC = new \App\Classify();
            $blog = $blogC->getBlog($id);
            $class = $classC->getAllClass();
            $data = [
                'blog' => $blog,
                'class' => $class
            ];
            return view('changeBlog', compact('data'));
        } else {
            return '您没有操作权限';
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $title = $request->title;
            $body = $request->body;
            $classID = $request->class;

            $blogC = new \App\Blog();
            $blogC->where('id', $id)
                ->update([
                    'title' => $title,
                    'body' => $body,
                    'class_id' => $classID
                ]);
            echo "<script>alert(\"编辑成功\")</script>";

            $classC = new \App\Classify();
            $class = $classC->getAllClass();
            $blog = $blogC->getBlogAll();
            $data = [
                'blog' => $blog,
                'class' => $class
            ];
            return view('index', compact('data'));
        }else{
            return '您没有操作权限';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $blogC = new \App\Blog();
            $blogC->deleteBlog($id);

            $classC = new \App\Classify();
            $class = $classC->getAllClass();
            $blog = $blogC->getBlogAll();
            $data = [
                'blog' => $blog,
                'class' => $class
            ];
            return view('index', compact('data'));
        }else{
            return '您没有操作权限';
        }
    }
}
