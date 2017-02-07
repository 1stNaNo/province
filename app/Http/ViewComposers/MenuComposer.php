<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_category;

class MenuComposer
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
      $category = Vw_category::fromView()->orderBy('parent_id')->get();

      $indexedCat = array();

      return $view->withModel($category)->with("category",$category->toJson());
    }
}
