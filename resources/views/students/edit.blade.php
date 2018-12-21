@extends('main')

@section('content')
<form method="post" action="{{action('StudentController@update', $id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <label for="studname">Complete Name</label>
    <input type="text" name="stud_name" id="studname" value="{{ $stud->stud_name }}" class="form-control"><br>
    <label for="course">Course</label>
    <input type="text" name="course" id="course"  value="{{ $stud->course_name }}" class="form-control"><br>
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control" rows="10">{{ $stud->address }}</textarea><br>
    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
</form>
@endsection