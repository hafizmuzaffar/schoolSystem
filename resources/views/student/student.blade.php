@extends('template.layout')

@section('content')
   
     <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @if (auth()->user()->role == 'Admin')
                                <a href="/student/create" class="btn btn-primary" >Add Student</a>
                                <a href="/student/export" class="btn btn-success">Export Data</a>
                            @endif
                        </div>      
                        <div class="card-body">
                            @if(auth()->user()->role == 'Admin')
                                <form action="/" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="import_file_student" id="file" class="form-control">
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-success">import</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                            <br><br><hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Student Number</th>
                                            <th>Name Student</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>School Class</th>
                                            @if (auth()->user()->role == 'Admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student as $item)
                                        <tr>
                                            <td>{{ $item->student_number }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->class->class_name }}</td>
                                            @if (auth()->user()->role == 'Admin')
                                            <td>
                                                 <a href="/student/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                                 <form action="/student/{{ $item-> id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                                </form>
                                            </td>
                                            @endif
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection