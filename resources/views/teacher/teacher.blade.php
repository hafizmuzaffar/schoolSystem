@extends('template.layout')

@section('content')
   
     <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @if (auth()->user()->role == 'Admin')
                            <a href="/teacher/create" class="btn btn-primary" >Add Teacher</a>
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Teacher Number</th>
                                            <th>Name Teacher</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Course</th>
                                            @if (auth()->user()->role == 'Admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $item)
                                        <tr>
                                            <td>{{ $item->teacher_number }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->course->course_name }}</td>
                                            @if (auth()->user()->role == 'Admin')
                                            <td>
                                                 <a href="/teacher/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                                 <form action="/teacher/{{ $item-> id }}" method="POST" class="d-inline">
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