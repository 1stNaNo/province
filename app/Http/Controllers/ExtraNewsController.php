<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_news;

class ExtraNewsController extends Controller
{

    public function index($count, $lang){

      \Session::put('lang',$lang);
      \Session::save();
      \App::setLocale(\Session::get('lang'));

      $news = Vw_news::latestNewsByLang($lang)->paginate($count);
      return \View::make('external')->withModel($news);
    }

}
