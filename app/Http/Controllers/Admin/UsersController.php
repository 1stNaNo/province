<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Datatables;
use Validator;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('lang');
    $this->middleware('auth');
  }

  public function index(){
    return view('admin.user_list');
  }

  public function userslist(){
    return Datatables::of(User::all())->make(true);
  }

  public function indexnewuser(Request $request){
    $user = new User;
    if(!empty($request->id)){
      $user = User::find($request->id);
    }
    return view('admin.user')->with(compact('user'));
  }

  public function save(Request $request){
    $validator = \Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);
    if($validator->fails())
      return response()->json($validator->messages(), 200);

    $user = new User;
    if(!empty($request->id)){
      $user = User::find($request->id);
    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return response()->json(['type' => 'success']);
  }

  public function remove(Request $request){
    $user = User::find($request->id);
    $user->delete();
    return response()->json(['type' => 'success']);
  }

}
