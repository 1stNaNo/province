<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Http\Controllers\Controller;
use Datatables;

class DecisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }
    public function index(){
    	return view('admin.decision');
    }

    public function complaintsList(Request $request){
    	if(!empty($request->kind))
    		return Datatables::of(Complaint::where('type', $request->type)->where('kind', $request->kind))->make(true);		
    	else
    		return Datatables::of(Complaint::where('type', $request->type))->make(true);
    }

    public function decisionregister(Request $request){
    	return view('admin.decisionregister')->with("id", $request->id);
    }

    public function save(Request $request){
   		$c = Complaint::find($request->id);
   		$c->decision = $request->decision;
   		$c->kind = $request->kind;
   		$c->type = 0;
   		$c->save();
   		return $c;
    }
}
