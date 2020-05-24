<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

use App\User;

class PagesController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => env('REVISE_APP_ID'),
            'redirect_uri' => 'http://localhost:8000/auth/callback',
            'response_type' => 'code',
            'scope' => '*',
            'state' => $state,
        ]);

        return redirect('http://localhost:8001/oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $state = session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state == $request->state,
            \InvalidArgumentException::class
        );

        $res = Http::post('http://localhost:8001/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('REVISE_APP_ID'),
            'client_secret' => env('REVISE_APP_SECRET'),
            'redirect_uri' => 'http://localhost:8000/auth/callback',
            'code' => $request->code,
        ]);

        $token = $res['access_token'];

        session()->put('token', $token);

        $res2 = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])
        ->get('http://localhost:8001/api/user');

        $u = (object) $res2->json()['user'];

        try {
            $user = User::findOrFail($u->uuid);
        }
        catch(ModelNotFoundException $e) {
            $user = User::create([
                'id' => $u->uuid,
                'fname' => $u->fname,
                'lname' => $u->lname,
                'email' => $u->email,
                'role' => $u->role
            ]);
        }

        $user->fname = $u->fname != $user->fname ? $u->fname : $user->fname;
        $user->lname = $u->lname != $user->lname ? $u->lname : $user->lname;
        $user->email = $u->email != $user->email ? $u->email : $user->email;
        $user->save();

        session()->put('details', (object) $res2->json()['details']);

        Auth::login($user);

        return redirect()->intended('/home');
    }

    public function logout()
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . session()->get('token')
        ])
        ->get('http://localhost:8001/api/logout');
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
