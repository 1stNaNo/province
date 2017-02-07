<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Link;
use Zjango\Laracurl\Facades\Laracurl;

class WeatherComposer
{
    public function compose(View $view)
    {

      $data = Link::byType('weather')->get();

      // $response = Laracurl::get('http://tsag-agaar.gov.mn/embed/?name='.$data[0]->link.'&color=ef6e25&color2=cc530e&color3=ffffff&color4=ffffff&type=vertical&tdegree=cwidth=270');

      return $view->withModel($data);
    }
}
