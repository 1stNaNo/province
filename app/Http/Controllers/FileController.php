<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views\Vw_ufile;
use App\Models\Views\Vw_filetype;
use Session;

class FileController extends Controller
{
  public function index($id){
    $files = Vw_ufile::where('type_id', $id)->where('lang', Session::get('lang'))->get();
    $type = Vw_filetype::where('ft_id', $id)->where('lang', Session::get('lang'))->get();
    return \View::make('file')->with(compact('files'))->with(compact('type'));
  }
}
