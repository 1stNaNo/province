<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_news;

class ExtraNewsController extends Controller
{
    public function index($count){

      $news = Vw_news::latestNews()->paginate($count);

      return response()->json($news->toArray());
    }

}
