<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }

    public function index(){
    	$banners = Banner::all();
    	return view('admin.banner')->with(compact("banners"));
    }

    public function save(Request $request){
    	foreach($request->bannerid as $bannerid){
    		$banner = Banner::find($request->bannerid[$bannerid]);
    		$banner->value = $request->bannerimg[$bannerid];
    		$banner->save();
    	}
    }
}
