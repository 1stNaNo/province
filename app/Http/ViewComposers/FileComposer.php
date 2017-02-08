<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Session;
use App\Models\Views\Vw_filetype;

class FileComposer
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

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view){
      $filetypes = Vw_filetype::where('lang', Session::get('lang'))->get();
      return $view->with('filetypes', $filetypes);
    }
}
