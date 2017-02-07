<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_category;

class CategorySidebarComposer
{

    public function compose(View $view)
    {

      $parentList = Vw_category::equalListById($view->cat_id)->get();
      $catList = Vw_category::childListByParentId($parentList[0]->parent_id)->get();

      $parent = Vw_category::equalListById($parentList[0]->parent_id)->get();

      return $view->withModel($catList)->with('parent',$parent);
    }
}
