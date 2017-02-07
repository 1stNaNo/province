<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Views\Vw_category;

class CategoryController extends Controller
{
    public function index(){

      // $category = Vw_category::fromView()->orderBy('parent_id')->get();

      return \View::make('category');
    }

}
