@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All users</div>

                    <div class="panel-body">

                        <div class="list-group">

                            <div class="list-group-item">

                                @foreach($users as $user)
                                    Name: {{$user->name}} <br>
                                    Email: {{$user->email}}
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection