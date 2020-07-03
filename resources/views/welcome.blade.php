@extends('layout.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Employer Name</th>
            @foreach($departments as $department)
                <th scope="col">{{$department->name}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>

        @foreach($employers as $id => $employer)
            <tr>
                <th scope="row">{{$employer->name}} {{$employer->surname}}</th>
                @foreach($departments as $department)
                    @if ($employer->departments->contains($department))
                        <th scope="row">
                            <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                        </th>
                    @else
                        <th scope="row">
                            <i class="fa fa-times" style="color: red" aria-hidden="true"></i>
                        </th>
                    @endif
                @endforeach


                @endforeach
            </tr>

        </tbody>
    </table>

@endsection
