<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        /*$this->middleware('auth');*/ /* <- aplica el middleware para todo el controlador */

        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Show index of register
     *
     * @return \Illuminate\Http\Response
     */
    public function registerIndex()
    {
        return view('login_and_register.register.index');
    }

    /**
     * Show the view profile index of user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consumers.profile.index');
    }

    /**
     * Show view index of the admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        return view('consumers.admins.index');
    }

    /**
     * Show view index of the change image.
     *
     * @return \Illuminate\Http\Response
     */
    public function showIndexUpdateImage()
    {
        return view('consumers.profile.updateImage.index');
    }

    /**
     * Update the image.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateImage(UpdateImageRequest $updateImageRequest)
    {
        $updateImageRequest->validated();

        $user = $this->user->findOrFail(Auth::user()->id);

        if ($updateImageRequest->hasFile('route_img'))
        {
            $file = $updateImageRequest->file('route_img');
            /**$name = $validates['user'].'_'.$file->getClientOriginalName();*/ /** <- Obtiene el nombre de la imagen*/
            $name = Auth::user()->user.'_'.$file->getClientOriginalExtension();
            $file->move(public_path('/img/perfiles/'.Auth::user()->user), $name);
            $route = 'img/perfiles/'.Auth::user()->user.'/'.$name;
        }
        else
        {
            return redirect()->back()->withErrors('No hay una imagen seleccionada.');
        }

        $attributes = [
            'route_img' => $route,
        ];

        $user->update($attributes);

        return redirect()->route('profile.index')->with('flash_info', 'Cambio de imagen exitoso.');
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
            'ext' => $validates['ext'],
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
    public function update(UpdateUserRequest $updateUserRequest)
    {
        $validates = $updateUserRequest->validated();

        $user = $this->user->findOrFail(Auth::user()->id);

        $attributes = [
            'name' => $validates['name'],
            'lastName' => $validates['lastName'],
            'date' => $validates['date'],
            'email' => $validates['email'],
            'ext' => $validates['ext'],
            'user' => $validates['user'],
            'role' => Auth::user()->role,
            //'role' => $validates['role'],
        ];

        $user->update($attributes);

        return redirect()->route('profile.index')->with('flash_info', 'Cambio de datos exitoso.');
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
