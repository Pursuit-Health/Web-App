<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    private $client;
    
    function __construct(){
      
      $this->client = new Client(['base_uri' => env('API_URL'),'timeout'  => 15.0,'headers'=>['Accept'=>'application/json']]);
    }
  
    function index(Request $request){
      $settings = $this->client->request('GET','settings/info',['headers'=>['Authorization'=>'Bearer '.session('user')->token]]);
      
      $settings = json_decode($settings->getBody());
      
      return view('user.profile')->with('settings',$settings);
    }
}
