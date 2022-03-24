<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timetable.timetable', [
            'timetables' => Timetable::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timetable.create', [
            'teacher' => Teacher::all(),
            'class'   => SchoolClass::all()
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
        $validatedData = $request->validate([
            'day'                       => 'required',
            'session'                   => 'required',
            'teacher_id'                => 'required',
            'school_class_id'           => 'required'
        ]);
        Timetable::create($validatedData);
        return redirect('/timetable')->with('success', 'New Timetable has been added!');
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
        $timetable = Timetable::findOrFail($id);
        return view('timetable.edit', [
            'teacher' => Teacher::all(),
            'class'   => SchoolClass::all(),
            'timetable' => $timetable
        ]);

        // return view('timetable.edit', [
        //     'teacher' => Teacher::all(),
        //     'class'   => SchoolClass::all(),
        //     'timetable' => $timetable
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        $rules = [
            'day' => 'required',
            'session'           => 'required',
            'teacher_id'        => 'required',
            'school_class_id' => 'required'
        ];
        $validatedData      = $request->validate($rules);
        Timetable::where('id', $timetable->id)->update($validatedData);
        return redirect('/timetable')->with('success', 'Timetable has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        Timetable::destroy($timetable->id);
        return redirect('/timetable')->with('success', 'Timetable has been deleted!');
    }
}
