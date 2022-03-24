<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.teacher', [
            'teachers' => Teacher::all()
        ]);
    }
    public function create()
    {
        return view('teacher.create-teacher', [
            'course' => Course::all()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_number' => 'required',
            'name'           => 'required',
            'address'        => 'required',
            'email'          => 'required|unique:teachers',
            'phone_number'   => 'required',
            'course_id'      => 'required'
        ]);
        Teacher::create($validatedData);
        return redirect('/teacher')->with('success', 'New Teacher has been added!');
    }
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', [
            'course'  => Course::all(),
            'teacher' => $teacher
        ]);
    }
    public function update(Request $request, Teacher $teacher)
    {
        $rules = [
            'teacher_number' => 'required',
            'name'           => 'required',
            'address'        => 'required',
            'phone_number'   => 'required',
            'course_id'      => 'required'
        ];
        if ($request->email != $teacher->email) {
            $rules['email'] = 'required|unique:teachers';
        }
        $validatedData = $request->validate($rules);

        Teacher::where('id', $teacher->id)->update($validatedData);
        return redirect('/teacher')->with('success', 'Teacher has been Updated');
    }


    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect('/teacher')->with('success', 'Teacher has been deleted!');
    }
}
