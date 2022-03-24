<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.student', [
            'student' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', [
            'class' => SchoolClass::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'student_number'  => 'required',
            'name'            => 'required',
            'address'         => 'required',
            'email'           => 'required|unique:students',
            'phone_number'    => 'required',
            'school_class_id' => 'required'
        ]);
        Student::create($validatedData);
        return redirect('/student')->with('success', 'New Student has been added!');
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
    public function edit(Student $student)
    {
        return view('student.edit', [
            'class'   => SchoolClass::all(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'student_number' => 'required',
            'name'           => 'required',
            'address'        => 'required',
            'phone_number'   => 'required',
            'school_class_id' => 'required'
        ];
        if (
            $request->email !=
            $student->email
        ) {
            $rules['email'] = 'required|
            unique:students';
        }
        $validatedData      = $request->validate($rules);

        Student::where('id', $student->id)->update($validatedData);
        return redirect('/student')->with('success', 'Student has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/student')->with('success', 'Student has been deleted!');
    }

    public function export()
    {
        $student = Student::all();

        $pdf = PDF::loadview('student.export-student', ['student' => $student]);
        return $pdf->download('student-Data.pdf');
    }
}
