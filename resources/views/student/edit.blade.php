@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Edit Student</h6>
       </div>
       <div class="card-body">
        <form action="/student/{{ $student->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="student_number" class="form-label">Student Number</label>
                <input type="text" class="form-control" id="student_number" name="student_number" value="{{ old('student_number', $student->student_number)}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" value="{{$student->name}}">
               @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$student->address}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$student->phone_number}}">
            </div>
            <div class="mb-3">
                <label for="school_class_id" class="form-label">Class</label>
                <select name="school_class_id" class="form-control form-select" id="school_class_id">
                    @foreach ($class as $item)
                        @if(old ('school_class_id', $student->school_class_id) == $item->id)
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