<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Link;

class SocialComposer
{
    public function compose(View $view)
    {


      $fblink = Link::byType('facebook')->first();
      $twitterlink = Link::byType('twitter')->first();
      $video = Link::byType('video')->first();

      $lang = \Session::get("lang");

      return $view->with(compact('fblink'))->with(compact('twitterlink'))->with(compact('video'))->with(compact('lang'));
    }
}
