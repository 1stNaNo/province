<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_news;

class ExtraNewsController extends Controller
{

    public function index($count, $lang){

      $news = Vw_news::latestNewsByLang($lang)->paginate($count);
      return \View::make('external')->withModel($news);
    }

}
