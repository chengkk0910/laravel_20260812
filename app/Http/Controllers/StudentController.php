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
        $data = Student::with('phone')->with('hobbies')->get();
        dd($data);
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
        // 1.先建立 主表 student
        $data = new Student;
        $data->name = $input['name'];
        $data->save();

        $student_id = $data->id;

        // 2.建立 子表 phone
        $phoneData = new Phone;
        $phoneData->student_id = $student_id;
        $phoneData->name = $input['phone'];
        $phoneData->save();

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
        // $data = $Student->with('phone')->get();
        $id = $Student->id;
        // first 單一 get 多筆 
        $data = Student::where('id', $id)->with('phone')->first();
        // dd($data);
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

        // 1.修改主表
        // $data = Student::find($id);
        $data = Student::where('id', $id)->first();
        // dd($data);
        $data->name = $input['name'];
        $data->save();

        // 2.刪除子表  如果子表資料 金錢 或者 很重要 記得 不要刪除 保留 可以用修改子表 讓他不顯示
        Phone::where('student_id', $id)->first()->delete();

        // 3.建立子表
        $phoneData = new Phone;
        $phoneData->student_id = $id;
        $phoneData->name = $input['phone'];
        $phoneData->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $Student)
    {
        $id = $Student->id;
        // dd('del ok');
        // 1.刪除主表
        Student::where('id', $id)->first()->delete();
        // 2.刪除子表
        Phone::where('student_id', $id)->first()->delete();
        // dd($id);
        // dd('del ok');
        return redirect()->route('students.index');
    }
}
