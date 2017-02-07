<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Views\Vw_answer;
use Session;

class PollController extends Controller
{
    public function submitPoll(Request $request){
    	$answer = Answer::find($request->answer_id);
    	$answer->total = ($answer->total) + 1;
    	$answer->save();
    	Session::put('poll', true);

    	return Vw_answer::where('poll_id', $request->poll_id)->where('lang', Session::get('lang'))->get();
    }
}
