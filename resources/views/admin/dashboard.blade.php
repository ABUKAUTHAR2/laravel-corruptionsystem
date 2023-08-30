<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <title>Multi-Page Form with Modals</title>
</head>

<body>

    <div class="container">
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">where do you want to go ?</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <!-- ... Other menu items ... -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reports') }}">
                                    <i class="fas fa-file-alt"></i> Reports
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-cogs"></i> Admin
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('admin.users') }}">Club Members</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.event') }}">Events</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                                            style="color: red">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>




                    </div>
                </div>
            </div>
        </nav>
        <h1>Multi-Page Form with Modals</h1>

        <h1>Admin Dashboard</h1>

        <!-- Statistics cards -->
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-info">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Region with Most Cases</h5>
                        <p class="card-text">{{ $regionWithMostCases->region }} ({{ $regionWithMostCases->count }}
                            cases)</p>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-building"></i> Organization with Most Cases</h5>
                        <p class="card-text">{{ $organizationWithMostCases->organization }}
                            ({{ $organizationWithMostCases->count }} cases)</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-list"></i> Total Reports</h5>
                        <p class="card-text">{{ $totalReports }}</p>
                    </div>
                </div>
                <br><br>
            </div>
            <div class="col-md-6">
                <div class="card bg-danger">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> Unprocessed Reports</h5>
                        <p class="card-text">{{ $unprocessedReports }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-users"></i> Total Users Who Submitted Their Details</h5>
                <p class="card-text">{{ $totalUsers }}</p>

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
    <div style="text-align: center; margin-top: 20px; color: #888;">
        &copy; Digital Club of KIUT 2023. All rights reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
