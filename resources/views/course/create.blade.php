@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Add Course</h6>
       </div>
       <div class="card-body">
        <form action="/course" method="POST">
            @csrf
            <div class="mb-3">
                <label for="course_name" class="form-label">Name Course</label>
                <input type="text" class="@error('course_name') is-invalid @enderror form-control" id="course_name" name="course_name">
               @error('course_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
        </form>
       </div>
   </div>
@endsection