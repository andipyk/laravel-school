@extends('main')
@section('content')
<a href="{{route('students.create')}}"><button class="btn btn-succes" >create</button></a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Address</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $stud)
        <tr>
            <td>{{ $stud->id }}</td>
            <td>{{ $stud->stud_name }}</td>
            <td>{{ $stud->course_name }}</td>
            <td>{{ $stud->address }}</td>
            <td><a href="{{action('StudentController@edit', $stud->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('StudentController@destroy', $stud->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $students->links() }}
@endsection