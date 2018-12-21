@extends('main')

@section('content')
<div class="col-md-4 col-md-offset-3 bg-default">

    @if ($errors->has('stud_name')) {{ $errors->first('stud_name') }} <br> @endif
    @if ($errors->has('course')) {{ $errors->first('course') }} <br> @endif
    @if ($errors->has('address')) {{ $errors->first('address') }} <br> @endif

    <h3>Create New</h3>
    <hr>
    <form action="{{ url('students')}}" method="POST">
        @csrf
        <label for="studname">Complete Name</label>
        <input type="text" name="stud_name" id="studname" class="form-control"><br>
        <label for="course">Course</label>
        <input type="text" name="course" id="course" class="form-control"><br>
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" rows="10"></textarea><br>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
@endsection