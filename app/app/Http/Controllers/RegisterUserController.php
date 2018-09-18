<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
  public function index(){
       $data['name'] = '';
       $data['birthday'] = '';
       $data['email'] = '';
       $data['trainerCode'] = '';
       return view('register.client',$data);
  }
  
  public function needTrainerID(){
    return view('register.providerTrainerID');
  }
}
