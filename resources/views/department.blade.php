@extends('layout.app')
@section('content')
    <h1>Department Page</h1>
    <form action="/department" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Enter the department name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                   placeholder="e.g Back-end">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Department Name</th>
            <th scope="col">Employers count</th>
            <th scope="col">Employers Max Salary</th>
            <th scope="col">Update</th>
            <th scope="col">Delete </th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)

            <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->name}}</td>
                <td>{{$department->employers_count}}</td>
                <td>{{$department->employersMaxSalary() ?? 0 }}  $</td>
                <td><a href="/department/{{$department->id}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form  action="/department/{{$department->id}}" method="post">
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
