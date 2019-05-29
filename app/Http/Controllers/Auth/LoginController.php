<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/order/adress';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticateBackend(Request $request)
    {
        // on prend les clés emails et password
        $credentials = $request->only('email','password');
        // class Auth qui a une methode attempt pour tenter d'identifier et prend en paramètre un tableau avec la clé email et mdp, && on vérifie que l'utilisateur a bien le role admin
        if(Auth::attempt($credentials) && Auth::user()->hasRole('admin')){
            // si tout est ok on redirige vers la page home du backend
            return redirect(route('backend_homepage'));
        }
        // si l'accès est impossible, on redirige sur le form du login :
        else {
            return redirect(route('backend_login'))->with('danger','Impossible de vous identifier');
        }
    }
}
