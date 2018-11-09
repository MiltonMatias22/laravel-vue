<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // defining breadcrumb params
        $breadcrumbParams = json_encode([
            ["titleText" => "Home","url" => route("home")],
            ["titleText" => "Articles","url" => ""]
        ]);
        $articles = json_encode([
            ['id'=>1,'title'=>'PHP course','description'=>'My PHP article','author'=>'Article Author 1','date'=>'0000/00/00'],
            ['id'=>2,'title'=>'VUE course','description'=>'My VUE article','author'=>'Article Author 2','date'=>'0000/00/00'],
            ['id'=>3,'title'=>'HTML course','description'=>'My HTML article','author'=>'Article Author 3','date'=>'0000/00/00']
        ]);
        return view('admin.article.index', compact('breadcrumbParams','articles'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
