@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Edit Kelas</h6>
       </div>
       <div class="card-body">
        <form action="/kelas/{{ $kelas->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="class_name" class="form-label">Class Name</label>
                <input type="text" class="@error('class_name') is-invalid @enderror form-control" id="class_name" name="class_name" value="{{$kelas->class_name}}">
               @error('class_name')
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