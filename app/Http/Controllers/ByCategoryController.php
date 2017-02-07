<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_news;

class ByCategoryController extends Controller
{
    public function index($id){

      $news = Vw_news::byCategoryList($id)->orderBy('insert_date', 'desc')->paginate(7);

      return \View::make('by_category', ['news'=>$news, 'resultType'=>'category']);
    }

    public function news(){

      $news = Vw_news::latestNews()->paginate(7);

      return \View::make('by_category', ['news'=>$news, 'resultType'=>'latestnews']);
    }

    public function search(Request $request){

      $news = Vw_news::search($request->keyword)->paginate(7);

      return \View::make('by_category', ['news'=>$news, 'resultType'=>'search', 'keyword'=> $request->keyword]);
    }

}
