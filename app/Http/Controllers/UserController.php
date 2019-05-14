<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Attributes
    */
    protected $User;

    /**
     * Method construct
    */
    public function __construct(User $user)
    {
        $this->middleware('auth');

        $this->User = $user;
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
    public function store(Request $request)
    {
        //
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
}
