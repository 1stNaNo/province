<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;

class SlideMainComposer
{
    public function compose(View $view)
    {

      $data = Vw_news::mainSlide()->orderBy('insert_date')->get();

      return $view->withModel($data);
    }
}
