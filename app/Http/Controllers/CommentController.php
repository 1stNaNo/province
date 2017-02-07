<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function save(Request $request){

      $validator = \Validator::make($request->all(), [
            'guest_name' => 'required',
            'guest_comment' => 'required',
        ]);

      $url = "/post/".$request->post_id;

      $redirect = redirect()->to($url);

      if(!$validator->fails()){

        $comment = new Comment;
        $comment->name = $request->guest_name;
        $comment->comment = $request->guest_comment;
        $comment->post_id = $request->post_id;
        $comment->insert_date = \DB::raw('NOW()');

        $comment->save();

      }else{
        $redirect->withInput($request->input());
      }

      return $redirect->withErrors($validator);

    }

}
