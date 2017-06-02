@extends('admin.layouts.app')

@section('content')

    <div class="col-md-10 content">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>Username</strong></td>
                    <td><strong>E-mail</strong></td>
                    <td><strong>First name</strong></td>
                    <td><strong>Last name</strong></td>
                    <td><strong>Street</strong></td>
                    <td><strong>Postal code</strong></td>
                    <td><strong>City</strong></td>
                    <td><strong>Country</strong></td>
                    <td><strong>Phone number</strong></td>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->street}}</td>
                        <td>{{$user->postal_code}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->phone_number}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{$users->links()}}
    </div>

    <script type="text/javascript">

        $(function () {
            $('.navbar-toggle-sidebar').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
            });
        });

    </script>

@endsection