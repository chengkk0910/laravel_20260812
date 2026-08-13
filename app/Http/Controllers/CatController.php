<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Cat::all();
        $data = Cat::get();
        // dd($data);
        // dd('hello CatController index');
        return view('cat.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('CatController create');
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $input = $request->except('_token');
        // dd($input);
        // dd($input['name']);
        $data = new Cat;

        $data->name = $input['name'];

        $data->save();

        return redirect()->route('cats.index');
        // dd('CatController store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        // dd($cat->name);    
        $data = $cat;
        // dd("Hello Edit ");
        return view('cat.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cat $cat)
    {
        $input = $request->except('_token', '_method');
        // $input = $request->all();
        // dd($input);
        $id = $cat->id;
        // $data = Cat::find($id);
        $data = Cat::where('id', $id)->first();
        // dd($data);
        $data->name = $input['name'];
        $data->save();
        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
