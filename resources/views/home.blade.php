@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Welcome, {{ Auth::user()->name }}!</div>

                    <div class="card-body">
                        <!-- Display a message about PCCB and fighting corruption -->
                        <div class="chairperson-message">
                            <div class="chairperson-text">
                                <h3>Fighting Corruption with PCCB</h3>
                                <p>
                                    Welcome to the fight against corruption in Tanzania, led by the Prevention and Combating of Corruption Bureau (PCCB).
                                    Corruption is a global issue that affects societies, economies, and individuals. PCCB is dedicated to eradicating corruption,
                                    promoting transparency, and ensuring accountability in Tanzania.
                                    Join us in our mission to combat corruption and build a better future for our nation.
                                </p>
                            </div>
                        </div>

                        <!-- Display anti-corruption activities (without images) -->
                        <h3>Anti-Corruption Activities</h3>
                        <div class="row">
                            <!-- Workshop -->
                            <div class="col-md-3 mb-4">
                                <div class="activity-card">
                                    <h4>Workshops</h4>
                                    <p>Participate in workshops on anti-corruption strategies and ethical practices.</p>
                                </div>
                            </div>
                            <!-- Discussion Sessions -->
                            <div class="col-md-3 mb-4">
                                <div class="activity-card">
                                    <h4>Discussion Sessions</h4>
                                    <p>Engage in conversations about corruption-related topics and solutions.</p>
                                </div>
                            </div>
                            <!-- Advocacy Campaigns -->
                            <div class="col-md-3 mb-4">
                                <div class="activity-card">
                                    <h4>Advocacy Campaigns</h4>
                                    <p>Take part in campaigns to raise awareness and drive change in Tanzania.</p>
                                </div>
                            </div>
                            <!-- Networking -->
                            <div class="col-md-3 mb-4">
                                <div class="activity-card">
                                    <h4>Networking</h4>
                                    <p>Connect with like-minded individuals committed to combating corruption.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <style>
        /* Custom styles for the activity cards */
        .activity-card {
            border: 1px solid #e0e0e0;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .activity-card:hover {
            transform: scale(1.05);
        }

        .activity-card h4 {
            margin-top: 10px;
        }
    </style>
@endsection
