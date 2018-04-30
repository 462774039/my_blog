<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AUTH;

class ClassifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classC = new \App\Classify();
        $class= $classC->getAllClass();
        return view('ClassList', compact('class'));
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
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) {
            $name = $request->name;
            $classC = new \App\Classify();
            $classC->name = $name;
            $classC->save();
            echo "<script>alert(\"添加成功\")</script>";
            $class= $classC->getAllClass();
            return view('ClassList', compact('class'));
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
        //
        return 'show';
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
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $classC = new \App\Classify();
            $class = $classC->getClass($id);
            return view('changeClass', compact('class'));
        }else{
            return "您没有访问该页权限";
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
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $name = $request->newName;

            $classC = new \App\Classify();
            $classC->where('id', $id)
                ->update([
                    'name' => $name,
                ]);
            echo "<script>alert(\"修改成功\")</script>";

            $class= $classC->getAllClass();
            return view('ClassList', compact('class'));
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
            $classC = new \App\Classify();
            $classC->deleteClass($id);
            $class= $classC->getAllClass();
            return view('ClassList', compact('class'));
        }else{
            return '您没有操作权限';
        }
    }
}
