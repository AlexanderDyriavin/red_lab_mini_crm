@extends('layout.app')
@section('content')
    <h1>Employer Page</h1>
    <form method="POST" action="/employer">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Enter name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Joe">
        </div>

        <div class="form-group">
            <label for="surname">Enter Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Doe">
        </div>

        <div class="form-group">
            <label for="middle_name">Enter middle name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Jane">
        </div>
        <div class="form-group">
            <label for="gender">Select a gender</label>
            <select name="gender" class="form-control" id="gender">
                <option value="man">Man</option>
                <option value="woman">Woman</option>
            </select>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" placeholder="ex 1000$">
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <label> Выберите отдел</label><br>
                @foreach($departments as $id => $department)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " name="department_id[]" type="checkbox" id="{{$department->id}}"
                               value="{{$department->id}}">
                        <label class="form-check-label "
                               for="{{$department->name}}">{{$department->name}}</label>
                    </div>
                @endforeach
            </div>

        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>

    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Employer name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employers as $employer)
            <tr>
                <th scope="row">{{$employer->id}}</th>
                <td>{{$employer->name}}</td>
                <td><a href="/employer/{{$employer->id}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form  action="/employer/{{$employer->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
