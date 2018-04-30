<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DiscussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $userID = $request->user_id;
            $body = $request->body;
            $blogID = $request->blog_id;

            $discussC = new \App\Discuss();
            $discussC->user_id = $userID;
            $discussC->body = $body;
            $discussC->blog_id = $blogID;
            $discussC->save();
            echo "<script>alert(\"发表成功\")</script>";

            $blogC = new \App\Blog();
            $blog = $blogC->getBlog($blogID);
            $discuss = $discussC->getAllDiscuss($blogID);

            $data = [
                'blog' => $blog,
                'discuss' => $discuss
            ];
            return view('blogInfo', compact('data'));
        }else{
            return '登陆后才能发布评论';
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $blogID = $request->blog_id;
        $discussC = new \App\Discuss();
        $discussC->deleteDiscuss($id);


        $blogC = new \App\Blog();
        $blog = $blogC->getBlog($blogID);
        $discuss = $discussC->getAllDiscuss($blogID);
        $data = [
            'blog' => $blog,
            'discuss' => $discuss
        ];
        return view('BlogInfo', compact('data'));
    }
}
