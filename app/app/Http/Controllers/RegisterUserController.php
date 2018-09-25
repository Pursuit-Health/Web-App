<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

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
  
  public function createAccount(Request $request){
    $client = new Client();

    try{
      $response = $client->request('GET',env('API_URL').'trainer/get/'.strtoupper($request->trainerCode),['headers'=>
                  ['Accept'     => 'application/json']]);
      $body = json_decode($response->getBody());
      return view('register.providerTrainerID')->with('success',$body);
    } catch (ClientException $e){
      if ($e->hasResponse()) {
    
        switch($e->getResponse()->getStatusCode()){
          case 404:
            $body = json_decode($e->getResponse()->getBody());
            return view('register.providerTrainerID')->with('error',$body->error);
          break;
          
          default:
            return view('register.providerTrainerID')->with('error','An unknown error has occurred');
          break;
        }
          
      }
    }
  }
}
