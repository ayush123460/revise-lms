<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

// Route::get('/redirect', function (Request $request) {
//     $request->session()->put('state', $state = Str::random(40));

//     $query = http_build_query([
//         'client_id' => '90a03d7d-dfd5-404d-97a4-215a6e721630',
//         'redirect_uri' => 'http://localhost:8000/auth/callback',
//         'response_type' => 'code',
//         'scope' => '',
//         'state' => $state,
//     ]);

//     return redirect('http://localhost:8001/oauth/authorize?'.$query);
// });

// Route::get('/auth/callback', function (Request $request) {
//     $state = $request->session()->pull('state');

//     throw_unless(
//         strlen($state) > 0 && $state === $request->state,
//         InvalidArgumentException::class
//     );

//     $http = new GuzzleHttp\Client;

//     $response = $http->post('http://your-app.com/oauth/token', [
//         'form_params' => [
//             'grant_type' => 'authorization_code',
//             'client_id' => 'client-id',
//             'client_secret' => 'client-secret',
//             'redirect_uri' => 'http://example.com/callback',
//             'code' => $request->code,
//         ],
//     ]);

//     return json_decode((string) $response->getBody(), true);
// });
