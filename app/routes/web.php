<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
});

Route::get('/dashboard/profile', 'ProfileController@index')->name('profile');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::post('/do-login', 'Auth\LoginController@login');



Route::post('/do-forgot-password', function () {
  $data = [];
  
  try{
    $client = new GuzzleHttp\Client();
    $response = $client->request('POST', 'https://gs.arizonawebdevelopment.com/public/v1/auth/forgot-password', [
      'headers' => ['Accept'     => 'application/json'],
        'form_params' => [
          'email' => $_POST['email']
        ]
    ]);
    
    if($response->getStatusCode() == 200){
      return view('forgot-password-sent');
    } else {
      $j = json_decode($response->getBody());
      dd($j);
      $data['error'] = $j->message ;
    }
    
  }
  catch (GuzzleHttp\Exception\ClientException $e)
  {
    $j = json_decode($e->getResponse()->getBody());
    $data['error'] = $j->message;
  }
  
  return view('/forgot-password')->with('message',$data['error'])->with('email',$_POST["email"]);
});

Route::get('/register-trainer', function () {
    $data['name'] = '';
    $data['birthday'] = '';
    $data['email'] = '';
    return view('register.trainer',$data);
})->name('register-trainer');

Route::get('/register-client','RegisterUserController@needTrainerID')->name('register-client');
Route::post('/register-client','RegisterUserController@createAccount')->name('register-client');

Route::post('/register/{type}', function ($type) {
  $error = '';
  $success = '';

  $data['name'] = $_POST['fullname'];
  $data['birthday'] = $_POST['birthdate'];
  $data['email'] = $_POST['email'];
  $data['trainerCode'] = isset($_POST['trainer-code']) ? $_POST['trainer-code'] : '';
  
  if(!in_array($type,array('client','trainer'))){
    $error = "unknow registration type";
  } else {
    switch($type){
      case 'trainer':
        try{
          $client = new GuzzleHttp\Client();
          $response = $client->request('POST', 'https://gs.arizonawebdevelopment.com/public/v1/auth/register/trainer', [
            'headers' => ['Accept'     => 'application/json'],
              'form_params' => [
                  'name' => $data['name'],
                  'birthday' => $data['birthday'],
                  'password' => $_POST['password'],
                  'email' => $data['email']
              ]
          ]);
          
          if($response->getStatusCode() == 200){
            $success = 'account created successfully';
          } else {
            dd($response);
          }
          
        }
        catch (Exception $e)
        {
          $error = $e->getMessage();
        }
      break;
      
      case 'client':
        try{
          $client = new GuzzleHttp\Client();
          $response = $client->request('POST', 'https://gs.arizonawebdevelopment.com/public/v1/auth/register/client', [
            'headers' => ['Accept'     => 'application/json'],
              'form_params' => [
                  'name' => $data['name'],
                  'birthday' => $data['birthday'],
                  'password' => $_POST['password'],
                  'email' => $data['email'],
                  'trainer_id' => $data['trainerCode']
              ]
          ]);
          
          if($response->getStatusCode() == 200){
            $success = 'account created successfully';
          } else {
            dd($response);
          }
          
        }
        catch (Exception $e)
        {
          $error = $e->getMessage();
        }
      break;
    }
  }

  $data['error'] = $error;
  $data['success'] = $success;
  
  return view("register.$type",$data);
});