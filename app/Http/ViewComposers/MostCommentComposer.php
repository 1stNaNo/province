<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;
use App\Models\ContentCat;
use \Illuminate\Pagination\Paginator;

class MostCommentComposer
{
    public function compose(View $view)
    {

      $data = Vw_news::mostComment()->paginate(9);

      return $view->withModel($data);
    }
}
