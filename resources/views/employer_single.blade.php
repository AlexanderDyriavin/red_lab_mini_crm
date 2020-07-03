@extends('layout.app')
@section('content')
    <div class="alert alert-secondary" role="alert">

        <form method="POST" action="/employer/{{$employer->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Enter name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$employer->name}}">
            </div>

            <div class="form-group">
                <label for="surname">Enter Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{$employer->surname}}">
            </div>

            <div class="form-group">
                <label for="middle_name">Enter middle name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name"
                       value="{{$employer->middle_name}}">
            </div>
            <div class="form-group">
                <label for="gender">Select a gender</label>
                <select name="gender" class="form-control" id="gender">
                    @if ($employer->gender == "man")
                        <option value="man" selected>Man</option>
                    @else
                        <option value="woman" selected>Woman</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="{{$employer->salary}}">
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label> Выберите отдел</label><br>

                        @foreach($departments as $id => $department)
                        <div class="form-check form-check-inline">
                            @if ($employer->departments->contains($department))
                                <input class="form-check-input " name="department_id[]" type="checkbox"
                                       id="{{$department->id}}"
                                       value="{{$department->id}}" checked>
                                <label class="form-check-label "
                                       for="{{$department->name}}">{{$department->name}}</label>
                            @else
                                <input class="form-check-input " name="department_id[]" type="checkbox"
                                       id="{{$department->id}}"
                                       value="{{$department->id}}">
                                <label class="form-check-label "
                                       for="{{$department->name}}">{{$department->name}}</label>
                            @endif

                    </div>
                        @endforeach



                </div>

            </div>
            {{--            <div class="form-group">--}}
            {{--                <div class="col-md-4">--}}
            {{--                    <label> Выберите отдел</label><br>--}}
            {{--                    @foreach($employer as $id => $department)--}}
            {{--                        <div class="form-check form-check-inline">--}}
            {{--                            <input class="form-check-input " name="department_id[]" type="checkbox" id="{{$department->id}}"--}}
            {{--                                   value="{{$department->id}}">--}}
            {{--                            <label class="form-check-label "--}}
            {{--                                   for="{{$department->name}}">{{$department->name}}</label>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}

            {{--            </div>--}}
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
