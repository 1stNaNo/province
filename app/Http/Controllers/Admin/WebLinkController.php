<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Views\Vw_weblinks;
use App\Models\Weblink;
use App\Models\Language;
use App\Models\Incr;
use App\Models\Source;
use App\Http\Controllers\Controller;
use Datatables;
use Validator;
class WebLinkController extends Controller
{
	public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }
    public function index(){
		return view('admin.weblink_list');
    }

    public function weblinkList(){
    	return Datatables::of(Vw_weblinks::fromView())->make(true);
    }

    public function register(Request $request){

    	$langs = Language::all();

			$source = collect([]);

			$weblinks = null;

    	if($request->isEdit && !empty($request->id)){

				foreach($langs as $lang){
						$wblinks = Vw_weblinks::where('id', $request->id)->where('lang', $lang->lang_key)->first();

						if(count($wblinks) > 0){
							$weblinks = $wblinks;
						}

						$source->put($lang->lang_key, $wblinks);
				}

    		return view('admin.weblink')->with(compact('weblinks'))->with(compact('langs'));
    	}
    	return view('admin.weblink')->with(compact('langs'))->with(compact('source'));
    }

    public function save(Request $request){
    	$v = Validator::make($request->all(), [
            'link'=>'required',
        ]);

        if($v->fails()){
        	return response()->json(['errors'=>$v->messages(), 'status'=>422], 200);
        }
        $s = new Source;
        if(empty($request->id)){
	        $incr = new Incr;
	        $incr->value=1;
	        $incr->save();
        }

    	foreach ($request->title as $key => $value) {
    		if(!empty($request->id)){
				$weblink = Weblink::find($request->id);
		    	$s = Source::where('code', $weblink->title)->where('lang', $key)->get();
		    	foreach($s as $src){
		    		$src->source = $value;
		    		$src->save();
		    	}

	    	}else{
        		$s = new Source;
        		$s->lang = $key;
	        	$s->source = $value;
	        	$s->kind = 'weblink';
	        	$s->code = $incr->id;
	        	$s->save();
        	}
    	}
		$wl = new Weblink;
    	if(!empty($request->id)){
    		$wl = Weblink::find($request->id);
    	}else{
    		$wl->title=$incr->id;
    	}
        $wl->category_id = $request->category_id;
        $wl->link = $request->link;
        $wl->img = $request->img;
        $wl->save();
    	return $wl;
    }

    public function delete(Request $request){
    	$weblink = Weblink::find($request->id);
    	$sources = Source::where("code", $weblink->title)->get();
    	foreach ($sources as $source) {
    		$source->delete();
    	}
    	$weblink->delete();
    }
}
