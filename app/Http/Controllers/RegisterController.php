<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Attributes
    */
    protected $request;
    protected $user;

    /**
     * Method construct
    */
    public function __construct(Request $request, User $user)
    {
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
        return view('login_and_register.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $registerRequest)
    {
        $validates = $registerRequest->validated();

        if ($registerRequest->hasFile('route_img'))
        {
            $file = $registerRequest->file('route_img');
            /**$name = $validates['user'].'_'.$file->getClientOriginalName();*/ /** <- Obtiene el nombre de la imagen*/
            $name = $validates['user'].'_'.$file->getClientOriginalExtension();
            $file->move(public_path('/img/perfiles/'.$validates['user']), $name);
            $route = 'img/perfiles/'.$validates['user'].'/'.$name;
        }
        else
        {
            $route = null;
        }

        $attributes = [
            'name' => $validates['name'],
            'lastName' => $validates['lastName'],
            'date' => $validates['date'],
            'route_img' => $route,
            'email' => $validates['email'],
            'user' => $validates['user'],
            'password' => bcrypt($validates['password']),
        ];

        $this->user->create($attributes);

        if(Auth::attempt([$this->user() => $validates['user'], 'password' => $validates['password']])){
            return redirect()->route('admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Function of get the user
     */
    public function user()
    {
        return 'user';
    }
}
