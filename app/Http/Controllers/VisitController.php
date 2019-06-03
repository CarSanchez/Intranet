<?php

namespace App\Http\Controllers;

Use App\Models\visit;
Use Illuminate\Http\Request;
Use DateTime;

class VisitController extends Controller
{
    //Attributes
    protected $request;
    protected $visit;

    public function __construct(Request $request, visit $visit)
    {
        $this->request = $request;
        $this->visit = $visit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $visit = $this->visit->where('ip', $this->request->ip());

        if ($visit->value('ip') == $this->request->ip())
        {
            //attributes
            $attributes = [
                'hits' => $visit->value('hits') + 1,
                'visit_date' => new DateTime(),
            ];

            $visit->update($attributes);

            return view('principal.index');
        }
        else
        {
            //attributes
            $attributes = [
                'ip' => $this->request->ip(),
                'hits' => $visit->value('hits') + 1,
                'visit_date' => new DateTime(),
            ];

            $this->visit->create($attributes);

            return view('principal.index');
        }
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
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(visit $visit)
    {
        //
    }
}
