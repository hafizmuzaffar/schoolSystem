@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Add Timetable</h6>
       </div>
       <div class="card-body">
        <form action="/timetable" method="POST">
            @csrf
            <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <select name="day" class="form-control form-select" id="day">
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="session" class="form-label">Session</label>
                <select name="session" class="form-control form-select" id="session">
                    <option value="1, 07.00-08.00">1, 07.00-08.00</option>
                    <option value="2, 08.00-09.00">2, 08.00-09.00</option>
                    <option value="3, 09.00-10.00">3, 09.00-10.00</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="teacher_id" class="form-label">Teacher</label>
                <select name="teacher_id" class="form-control form-select" id="teacher_id">
                    @foreach ($teacher as $item)
                        @if(old ('teacher_id') == $item->id)
                        <option value="{{ $item->id }}" selected>{{$item->name}} - 
                        {{ $item->course->course_name }}</option>
                        @else
                        <option value="{{ $item->id }}">{{$item->name}} - 
                        {{ $item->course->course_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="school_class_id" class="form-label">Class</label>
                <select name="school_class_id" class="form-control form-select" id="school_class_id">
                    @foreach ($class as $item)
                        @if(old ('school_class_id') == $item->id)
                        <option value="{{ $item->id }}" selected>{{$item->class_name}}</option>
                        @else
                        <option value="{{ $item->id }}">{{$item->class_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
        </form>
       </div>
   </div>
@endsection