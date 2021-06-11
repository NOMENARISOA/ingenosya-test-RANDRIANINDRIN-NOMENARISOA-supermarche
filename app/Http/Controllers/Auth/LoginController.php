<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)

    {

        $input = $request->all();



        $this->validate($request, [

            'username' => 'required',

            'password' => 'required',

        ]);



        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if(Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password'])))

        {
            if(Auth::user()->role == 1){
                return redirect()->route('backoffice.index');
            }
            if(Auth::user()->role == 2){
                return redirect()->route('stock.gestion');
            }
            if(Auth::user()->role == 3){
                return redirect()->route('vente.index');
            }


        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }



    }
}
