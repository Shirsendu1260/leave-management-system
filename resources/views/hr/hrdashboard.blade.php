<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS • HR Dashboard</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body class="min-vh-100">
    <!-- Navbar + Main -->
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <nav class="fixed-top w-100 navbar navbar-expand-lg bg-body-tertiary shadow-sm shadow-bottom">
            <div class="container-fluid px-3">
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / HR DASHBOARD</div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav justify-content-end flex-grow-1 me-auto my-1 my-md-0 my-lg-0 px-2 navbar-nav-scroll"
                        style="--bs-scroll-height: auto">
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link logout" href="{{route('hr.logout')}}">Logout</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link" href="{{route('hr.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0 d-flex align-items-center">
                            <div class="nav-link">Welcome, <span class="custom-bg-text"
                                    style="font-weight: 500;">{{Auth::guard('hr')->user()->name}}</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="px-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        @if(Session::has('success'))
                        <div class="alert alert-success shadow mb-4 w-100">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-danger shadow mb-4 w-100">{{Session::get('error')}}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Pending <br>Applications</h5>
                                <h6 class="mb-3">&nbsp;</h6>
                                <a href="{{route('hr.pendingapplications')}}" class="btn custom-btn">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Viewed <br>Applications</h5>
                                <h6 class="mb-3">&nbsp;</h6>
                                <a href="{{route('hr.totalapplications')}}" class="btn custom-btn">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Registered <br>Employees</h5>
                                <h6 class="mb-3">&nbsp;</h6>
                                <a href="{{route('hr.totalemployees')}}" class="btn custom-btn">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Register <br>An Employee</h5>
                                <h6 class="mb-3">&nbsp;</h6>
                                <a href="{{route('hr.emregister')}}" class="btn custom-btn">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom text-dark text-opacity-75 py-3">
        <p class="text-center m-auto">&copy; 2024 | Designed and developed by <a
                href="https://www.linkedin.com/in/shirsendu-mali-a61353230/"
                class="link-dark link-opacity-75 link-opacity-100-hover text-decoration-none">Shirsendu Mali</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>