<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    protected $request;
    protected $loginRequest;
    protected $user;

    public function __construct(Request $request, User $user)
    {
        $this->middleware('guest', [
            'only' => 'index'                    //Authenticate client user created, mostrar formulario si no esta autenticado
        ]);

        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login_and_register.login.index');
    }

    /**
     * Function login_and_register.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->validated();

        $userdb = $this->user->where('user', $credentials['user'])->first();

        dd($userdb);

        /*if (isset($userdb->user)){
            if ($userdb->active){
                if (Auth::attempt($credentials)){
                    return redirect()->route('admin');
                }
                else{
                    return redirect()->route('index')->withErrors(['email' => 'Correo o contraseña incorrecto'])->withInput();
                }
            }
            else{
                return redirect()->route('index')->withErrors(['Tu usuario no está activo, contacta al administrador'])->withInput();
            }
        }
        else{
            return redirect()->route('index')->withErrors(['Tu usuario no existe, contacta al administrador'])->withInput();
        }*/
    }
}
