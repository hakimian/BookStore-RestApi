<?php

namespace App\Http\Controllers\API;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Author::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => "required|alpha",
            "lastname" => "required|alpha"
        ]);
        $author = new Author;
        $author -> firstname = $request -> firstname;
        $author -> lastname = $request -> lastname;
        $author ->save();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        if(! is_null($request->firstname))
            $author->firstname = $request->firstname;
        if(! is_null($request->lastname))
            $author->lastname = $request->lastname;
        $author->save();
        return response('رکورد با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response('`نویسنده با موفقیت حذف شد.`');
    }
}