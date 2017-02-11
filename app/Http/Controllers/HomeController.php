<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use App\Models\RolePermission;
use App\Models\Permission;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userrole = UserRole::where('user_id', Auth::user()->id)->get();
      foreach ($userrole as $ur) {
          $roleper = RolePermission::where('role_id', $ur->role_id)->get();
          foreach ($roleper as $rp) {
              $perm = Permission::find($rp->permission_id);
              Session::put($perm->permission_name, $perm->permission_id);
          }
      }
      return view('home');
    }
}
