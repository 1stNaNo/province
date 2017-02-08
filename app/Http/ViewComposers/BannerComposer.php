<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Banner;

class BannerComposer
{

    public function compose(View $view)
    {

      $banner = Banner::all();

      return $view->with('banner', $banner);
    }
}
