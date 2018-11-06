<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use App\User;

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
    
    function login(Request $request){

      $data = [];

      try{
        $response = $this->client->request('POST', 'auth/login', [
          'headers' => ['Accept' => 'application/json'],
            'form_params' => [
                'password' => $request->password,
                'email' => $request->email
            ]
        ]);
        
        
        if($response->getStatusCode() == 200){
          $json = json_decode($response->getBody()->getContents());

          $user = new User();
          $user->id = $json->data->id;
          $user->name = $json->data->name;
          $user->user_type = $json->meta->user_type;
          $user->token = $json->meta->token;
          
          $request->session()->put('user',$user);
          
          return redirect('dashboard');
        } else {
          $data['error'] = $response;
        }
      }
      catch (\GuzzleHttp\Exception\ClientException $e) {
        switch($e->getResponse()->getStatusCode()){
          case "401":
            $data['error'] = 'Invalid email or password entered.';
          break;
          case "404":
            $data['error'] = 'We could not find what you were looking for.';
          break;
          default:
            $ex = json_decode($e->getResponse()->getBody());
            $data['error'] = $ex->message;
        }        
      }
      catch (\Exception $e)
      {
        $error = $e->getMessage();
        $data['error'] = $error;
      }
      
      return view('/login')->with('message',$data['error'])->with('email',$_POST["email"]);
    }
}
