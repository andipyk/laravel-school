<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = \DB::table('students')->paginate(2);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'stud_name' => 'required|max:50',
            'course' => 'required|min:2'
    
        ],[
            'stud_name.required' => 'Please enter the student\'s name ',
            'course.min' => 'Course should be minimum of 2 characters'
        ]);
    
        $crud = new \App\Student([
            'stud_name' => $request->get('stud_name'),
            'course_name' => $request->get('course'),
            'address' => $request->get('address'),
        ]);
        $crud->save();
        return redirect('/students');
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
        $stud = \App\Student::find($id);
        return view('students.edit', compact('stud','id'));
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
        $crud = \App\Student::find($id);
        $crud->stud_name = $request->get('stud_name');
        $crud->course_name = $request->get('course');
        $crud->address = $request->get('address');
        $crud->save();
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stud = \App\Student::find($id);
        $stud->delete();
        return redirect('/students');
    }
}
