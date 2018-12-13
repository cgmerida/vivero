<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:plants.index')->only('index');
        $this->middleware('permission:plants.create')->only(['create', 'store']);
        $this->middleware('permission:plants.edit')->only(['edit', 'update']);
        $this->middleware('permission:plants.show')->only('show');
        $this->middleware('permission:plants.destroy')->only('destroy'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('plants.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plant = Plant::create($request->all());

        $plant->permissions()->sync($request->permissions);

        return back()->withSuccess(trans('app.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        $permissions = Permission::all();
        return view('plants.show', compact('plant$plant', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        $permissions = Permission::all();
        return view('plants.edit', compact('plant$plant', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->all());

        $plant->permissions()->sync($request->permissions);

        return redirect()->route('plants.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
