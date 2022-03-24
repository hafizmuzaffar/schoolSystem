<h1>Student Data</h1>

<table border="1" style="width: 100%">
    <thead>
        <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Addres</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Class</th>
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
            </tr>
            
        @endforeach
    </tbody>
</table>