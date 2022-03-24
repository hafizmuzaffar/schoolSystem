@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Add Teacher</h6>
       </div>
       <div class="card-body">
        <form action="/teacher" method="POST">
            @csrf
            <div class="mb-3">
                <label for="teacher_number" class="form-label">Teacher Number</label>
                <input type="text" class="form-control" id="teacher_number" name="teacher_number" value="{{ old('teacher_number')}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name">
               @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select name="course_id" class="form-control form-select" id="course_id">
                    @foreach ($course as $item)
                        @if(old ('course_id') == $item->id)
                        <option value="{{ $item->id }}" selected>{{$item->course_name}}</option>
                        @else
                        <option value="{{ $item->id }}">{{$item->course_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
        </form>
       </div>
   </div>
@endsection