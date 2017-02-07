<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;
use App\Models\ContentCat;
use \Illuminate\Pagination\Paginator;

class SlideSidebarComposer
{
    public function compose(View $view)
    {

      $currentPage = 1; // You can set this to any page you want to paginate to

      // Make sure that you call the static method currentPageResolver()
      // before querying users
      Paginator::currentPageResolver(function () use ($currentPage) {
          return $currentPage;
      });

      $content_cat = ContentCat::where('content_name', 's_slide1')->get();

      $data = Vw_news::byCategory($content_cat[0]->cat_id, 5)->get();

      return $view->withModel($data);
    }
}
