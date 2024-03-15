<?php

namespace Modules\Area\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AreaController extends Controller
{
    protected $controller;
    public function __construct(Controller $controller) {
        $this->controller = $controller;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $output =  $this->controller->sendingRequest('/areas',env('API_TOKEN'),'GET');
        return response()->json(json_decode($output));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('area::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $output =  $this->controller->sendingRequest('/areas/'.$id,env('API_TOKEN'),'GET');
        return response()->json(json_decode($output));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('area::edit');
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
