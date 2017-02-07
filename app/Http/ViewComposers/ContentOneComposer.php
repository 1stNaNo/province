<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;
use App\Models\ContentCat;

class ContentOneComposer
{
    public function compose(View $view)
    {

      $content_cat = ContentCat::where('content_name', 'first')->get();

      $data = Vw_news::byCategory($content_cat[0]->cat_id, 6)->get();

      return $view->withModel($data);
    }
}
