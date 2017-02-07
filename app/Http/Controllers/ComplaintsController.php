<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintsController extends Controller
{
    public function save(Request $request){

      $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

      $url = "/complaints";

      $redirect = redirect()->to($url);

      if(!$validator->fails()){
        $complaint = new Complaint;
        $complaint->name = $request->name;
        $complaint->email = $request->email;
        $complaint->content = $request->message;
        $complaint->type = 0;
        $complaint->kind = 0;
        $complaint->insert_date = \DB::raw('NOW()');

        $complaint->save();

        $redirect->with('status','true');

      }else{
        $redirect->withInput($request->input());
      }

      return $redirect->withErrors($validator);

    }

    public function complaintInfo(){
      return Complaint::all();
    }

}
