<?php namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // var_dump(Comment::all());die();
        return view('admin.comments.index')->withComments(Comment::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.comments.edit')->withComment(Comment::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        exit("asdf");
        $this->validate($request, [
            'nickname' => 'required',
            'content' => 'required',
        ]);
        if (Comment::where('id', $id)->update(Input::except(['_method', '_token']))) {
            return Redirect::to('admin/comments');
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    // public function update(Request $request, $id)
    // {
    //     exit("asdfa");

    //     $this->validate($request, [
    //         'nickname' => 'required',
    //         'content' => 'required',
    //     ]);

    //     if (Comment::where('id', $id)->update(Input::except(['_method', '_token']))) {
    //         return Redirect::to('admin/comments');
    //     } else {
    //         return Redirect::back()->withErrors('update failed');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return Redirect::to('admin/comments');
    }

}
