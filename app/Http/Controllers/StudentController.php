<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Phone;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Student::all();
        // with 我們的relation
        $data = Student::with('phone')->get();
        // dd($data[0]->phone->name);
        // dd($data);
        // dd('hello StudentController index');
        return view('student.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('StudentController create');
        return view('student.create');
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
        $data = new Student;

        $data->name = $input['name'];

        $data->save();

        return redirect()->route('students.index');
        // dd('StudentController store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $Student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $Student)
    {
        // dd($Student->name);    
        $data = $Student;
        // dd("Hello Edit ");
        return view('student.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $Student)
    {
        $input = $request->except('_token', '_method');
        // $input = $request->all();
        // dd($input);
        $id = $Student->id;
        // $data = Student::find($id);
        $data = Student::where('id', $id)->first();
        // dd($data);
        $data->name = $input['name'];
        $data->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $Student)
    {
        $id = $Student->id;
        Student::where('id', $id)->first()->delete();
        // dd($id);
        // dd('del ok');
        return redirect()->route('students.index');
    }
}