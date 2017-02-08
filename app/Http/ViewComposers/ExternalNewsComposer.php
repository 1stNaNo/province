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

      $data = '';
      $external = External::all();

      foreach($external as $item){
          // var_dump($item->link.'/extranews/'.$item->count.'/'.\Session::get("lang"));
          $response = Laracurl::get($item->link.'/extranews/'.$item->count.'/'.\Session::get("lang"));
          $result = null;

          if($response->code == '200 OK'){
              $result = $response->body;
          }
      }
      $data = $data."".$result;


      return $view->with('data', $data);
    }
}
