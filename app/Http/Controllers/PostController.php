<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_news;
use App\Models\News;
use App\Models\Comment;

class PostController extends Controller
{
    public function index($id){

      $news = News::find($id);

      $vwCount = $news->views;
      $vwCount = $vwCount + 1;

      $news->views = $vwCount;

      $news->save();

      $comment = Comment::byPostId($id)->orderBy('insert_date', 'desc')->get();

      $post = Vw_news::byId($id)->get();
      return \View::make('post')->withModel($post)->with('comment', $comment);
    }

}
