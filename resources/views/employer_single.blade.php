@extends('layout.app')
@section('content')
    <div class="alert alert-secondary" role="alert">
        <h1>{{($employer->name)}}</h1>
        <form class="mt-5" action="/department/{{$employer->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Update the name of Employer </label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                       value="{{$employer->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
