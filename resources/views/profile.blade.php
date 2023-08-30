@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td>{{ Auth::user()->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>{{ Auth::user()->gender }}</td>
                            </tr>
                            <tr>
                                <th>Birthdate:</th>
                                <td>{{ Auth::user()->birthdate }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ Auth::user()->address }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Mobile:</th>
                                <td>{{ Auth::user()->mobile }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button style="width: 75%%; 
                                    background-color: #4c5baf; 
                                color: white;
                                 padding: 10px;
                                  border: none; 
                                  border-radius: 3px;
                                   cursor: pointer;"
                                    onclick="window.location.href='{{ route('edit-profile') }}'">
                                    Go to Edit Profile
                                
                        </button>
                    <br><br>
                    <form action="{{ route('delete-account') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        @csrf
                        @method('delete')
                        <button type="submit" style="
                        width: 75%%; 
                        background-color: #ff0d0d;
                                color: white;
                                 padding: 10px;
                                  border: none; 
                                  border-radius: 3px;
                                   cursor: pointer;
                        color:azure;border-radius:5%;
                         border-color:#ff0d0d">Delete Profile</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: fixed; bottom: 10px; left: 10px;">
            <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                style="color: white;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
