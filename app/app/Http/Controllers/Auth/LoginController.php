<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    private $client;
    
    function __construct(){
      $this->client = new Client([
          // Base URI is used with relative requests
          'base_uri' => env('API_URL'),
          // You can set any number of default request options.
          'timeout'  => 15.0,
      ]);
      
      
    }
    function login(){
      $data = [];

      try{
        $response = $this->client->request('POST', '/public/v1/auth/login', [
          'headers' => ['Accept' => 'application/json'],
            'form_params' => [
                'password' => $_POST['password'],
                'email' => $_POST['email']
            ]
        ]);
        
        if($response->getStatusCode() == 200){
          return view('user/dashboard');
        } else {
          $data['error'] = $response;
        }
      }
      catch (ClientException $e) {
        echo Psr7\str($e->getRequest());
        echo Psr7\str($e->getResponse());
      }
      catch (Exception $e)
      {
        $error = $e->getMessage();
        $data['error'] = $error;
      }
      
      return view('/login')->with('message',$data['error'])->with('email',$_POST["email"]);
    }
}
