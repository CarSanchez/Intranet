<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Attributes
    */
    protected $request;
    protected $loginRequest;
    protected $user;

    /**
     * Metodo constructor
     */
    public function __construct(Request $request, User $user)
    {
        /**
         * Authenticate client user created, mostrar formulario si no esta autenticado
        */
        $this->middleware('guest', [
            'only' => ['index', 'login'],
        ]);

        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Show the view of login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login_and_register.login.index');
    }

    /**
     * Function login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $loginRequest)
    {
        $validates = $loginRequest->validated();

        $userdb = $this->user->where('user', $validates['user'])->first();

        if (isset($userdb->user))  /* Comprueba si existe el usuario */
        {
            if ($userdb->active) /* Comprueba si esta activo el usuario existente */
            {
                if (Auth::attempt($validates)) /* Comprueba si las credenciales son validas */
                {
                    switch (Auth::user()->role->role)
                    {
                        case 'sa':
                            return redirect()->route('sas');
                            break;
                        case 'admin':
                            //return dd('admin');
                            return redirect()->route('profile.index');
                            break;
                        case 'user':
                            //return dd('user');
                            return redirect()->route('profile.index');
                            break;
                        case 'inv':
                            return dd('inv');
                            break;
                        default :
                            return redirect()->route('sas');
                            break;
                    }
                }
                else
                {
                    return redirect()->back()
                        ->withErrors(['user' => 'Usuario o contraseña incorrecto'])->withInput();
                }
            }
            else {
                return redirect()->back()
                    ->withErrors(['user' => 'Tu usuario no está activo, contacta al administrador'])->withInput();
            }
        }
        else
        {
            return redirect()->back()
                ->withErrors(['user' => 'Tu usuario no existe, registrate ó contacta al administrador.'])->withInput();
        }
    }

    /**
     * Function logout
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        Auth::logout(); /** <- Cierra el inicio de sesion */
        Session::flush(); /** <- Elimina variables de sesion */
        Session::forget('intranet_session'); /** <- Elimina cookies de sesion por key */
        return redirect()->route('index'); /** <- Redirige a una pagina */
    }
}
