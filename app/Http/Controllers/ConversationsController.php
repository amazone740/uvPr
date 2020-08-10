<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
    public function index(){
        $client=['gildas','carlos','voltaire'];
      //return view('conversations/index',['data'=>$client]);

      $users = User::select('name','id')->get();
      return view('conversations/index',['data'=>$users],['data2'=>$client]);

    }
    public function show(int  $id){

    }


}
