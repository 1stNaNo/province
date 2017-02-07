<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_poll;
use App\Models\Views\Vw_answer;
use Illuminate\Http\Request;
use Session;

class PollComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      $poll = Vw_poll::where('active_flag', 1)->where('lang', Session::get('lang'))->first();
      $answers = Vw_answer::where('poll_id', $poll->id)->where('lang', Session::get('lang'))->get();

      return $view->with(compact('poll'))->with(compact('answers'));
    }
}
