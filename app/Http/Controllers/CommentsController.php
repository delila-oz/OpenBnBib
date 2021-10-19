<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|min:5|max:2000',
            'profile_id'
        ]);

        // den aktuellen, sendenden User finden
        $user_id = Auth::id();

        //einen neuen Datenbankeintrag machen
        $comment = new Comment();
        $comment->message = $request->input('message');
        $comment->user_id = $user_id;
        $comment->profile_id = $request->input('profile_id');;
        $comment->save();
        //dd($comment);
        return redirect("/profile/{$comment->profile->user->username}");
    }

      /**
     * Get the profile that owns the comment.
     */
    public function profile() {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    /**
     * Get the user that wrote the comment.
     */
    public function user() {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
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
