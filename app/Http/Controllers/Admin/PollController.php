<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Poll;
use App\Models\Views\Vw_poll;
use App\Models\Answer;
use App\Models\Incr;
use App\Models\Source;
use App\Models\Language;
use App\Http\Controllers\Controller;
use Datatables;

class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }
    public function index(){
      return view('admin.poll');
    }

    public function pollsList(Request $request){
        return Datatables::of(Vw_poll::fromView())->make(true);
    }

    public function pollregister(Request $request){
      $langs = Language::all();
      return view('admin.pollregister')->with(compact('langs'));
    }

    public function save(Request $request){
      $incr = new Incr;
      $incr->value=1;
      $incr->save();

      foreach($request->question as $key => $value){
        $s_title = new Source;
        $s_title->source = $value;
        $s_title->lang = $key;
        $s_title->code = $incr->id;
        $s_title->kind = 'poll';
        $s_title->save();
      }
      //DISABLING OLD POLLS
      $polls = Poll::all();
      foreach ($polls as $poll) {
        $poll->active_flag = 0;
        $poll->save();
      }

      $poll = new Poll;
      $poll->title_sid = $incr->id;
      $poll->active_flag = 1;
      $poll->save();
      for ($i = 0; $i < count($request->answer); $i++) {
        $incr = new Incr;
        $incr->value=1;
        $incr->save();
        foreach($request->answer[$i] as $key => $value){
          $s_title = new Source;
          $s_title->source = $value;
          $s_title->lang = $key;
          $s_title->code = $incr->id;
          $s_title->kind = 'answer';
          $s_title->save();
        }

        $answer = new Answer;
        $answer->poll_id = $poll->id;
        $answer->text_sid = $incr->id;
        $answer->total = 0;
        $answer->save();
      }

      return $poll;
    }

    public function activepoll(Request $request){
      $polls = Poll::all();
      foreach ($polls as $poll) {
        $poll->active_flag = 0;
        $poll->save();
      }

      $poll = Poll::find($request->poll_id);
      $poll->active_flag = 1;
      $poll->save();

      return $poll;
    }

    public function inactivepoll(Request $request){
      $poll = Poll::find($request->poll_id);
      $poll->active_flag = 0;
      $poll->save();

      return $poll;
    }
}
