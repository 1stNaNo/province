<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_weblinks;

class WebLinksController extends Controller
{
    public function index($id){

      $weblink = Vw_weblinks::fromByCatId($id)->get();

      return \View::make('weblinks', ['weblink'=>$weblink]);
    }
}
