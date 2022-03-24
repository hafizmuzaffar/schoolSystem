@extends('template.layout')

@section('content')
   
     <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                              @if (auth()->user()->role == 'Admin')
                                <a href="/kelas/create" class="btn btn-primary" >Add Kelas</a>
                              @endif
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Class</th>
                                            <th>Name Kelas</th>
                                            @if (auth()->user()->role == 'Admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->class_name }}</td>
                                            @if (auth()->user()->role == 'Admin')
                                            <td>
                                                 <a href="/kelas/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                                 <form action="/kelas/{{ $item-> id }}" method="POST" class="d-inline">
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