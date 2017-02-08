<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Models\Views\Vw_news;
use App\Models\External;
use \Illuminate\Pagination\Paginator;
use Zjango\Laracurl\Facades\Laracurl;

class ExternalNewsComposer
{
    public function compose(View $view)
    {

      $data = [];
      $external = External::all();

      foreach($external as $item){
          $response = Laracurl::get($item->link.'/extranews\/'.$item->count);
          $result = null;

          if($response->code == '200 OK'){
              //$result = json_decode($response->body, true);
          }
      }
      var_dump($result);

      return $view->withModel($data);
    }
}
