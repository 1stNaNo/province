<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;

class LatestNewsComposer
{
    public function compose(View $view)
    {

      $data = Vw_news::latestNews()->paginate(9);

      return $view->withModel($data);
    }
}
