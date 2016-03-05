<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //return view('pages.show')->withPage(Page::find($id));
        exit("asdf");
    }
}
