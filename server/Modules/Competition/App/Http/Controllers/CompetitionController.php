<?php

namespace Modules\Competition\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompetitionController extends Controller
{
    protected $controller;
    public function __construct(Controller $controller) {
        $this->controller = $controller;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $output =  $this->controller->sendingRequest('/competitions?areas='.$request->areas,env('API_TOKEN'),'GET');
        return response()->json(json_decode($output));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competition::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function match($id,Request $request)
    {
        $output =  $this->controller->sendingRequest('/competitions/'.$id.'/matches',env('API_TOKEN'),'GET', $request->all());
        return response()->json(json_decode($output));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $output =  $this->controller->sendingRequest('/competitions/'.$id.'/teams',env('API_TOKEN'),'GET');
        return response()->json(json_decode($output));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('competition::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
