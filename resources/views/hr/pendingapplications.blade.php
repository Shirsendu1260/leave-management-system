<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS • Pending Applications</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body class="min-vh-100">
    <!-- Navbar + Main -->
    <div class="d-flex flex-column justify-content-center align-items-center">
        <nav class="w-100 navbar navbar-expand-lg bg-body-tertiary shadow-sm shadow-bottom">
            <div class="container-fluid px-3">
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / PENDING
                    APPLICATIONS</div>
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
        <div class="container d-flex px-4 px-md-0 px-lg-0 my-5 min-vh-100">
            <div class="card shadow">
                <div class="custom-bg rounded-top">
                    <div class="d-flex justify-content-between m-0 p-3 text-white">
                        <h5 class="m-0 d-flex align-items-center">Pending Applications</h5>
                        <a href="{{route('hr.dashboard')}}" class="btn btn-sm btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Dept.</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Day</th>
                                    <th>Reason</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pendingapplications)
                                @foreach($pendingapplications as $pendingapplication)
                                <tr valign="middle">
                                    <td>{{ $pendingapplication->id }}</td>
                                    <td>{{ $pendingapplication->uid }}</td>
                                    <td>{{ $pendingapplication->name }}</td>
                                    <td>
                                        @if($pendingapplication->photo != '' && file_exists(public_path() .
                                        '/uploads/users/'
                                        .
                                        $pendingapplication->photo))
                                        <img src="{{ url('/uploads/users/' . $pendingapplication->photo) }}" width="50"
                                            height="50" class="rounded-circle">
                                        @else
                                        <img src="{{ url('/assets/images/' . 'user.png') }}" width="50" height="50"
                                            class="rounded-circle">
                                        @endif
                                    </td>
                                    <td>{{ $pendingapplication->email }}</td>
                                    <td>{{ $pendingapplication->gender }}</td>
                                    <td>{{ $pendingapplication->dept }}</td>
                                    <td>{{ $pendingapplication->from }}</td>
                                    <td>{{ $pendingapplication->to }}</td>
                                    <td>{{ $pendingapplication->day }}</td>
                                    <td>{{ $pendingapplication->reason }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-sm custom-btn me-1">Approve</button>
                                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-dark text-opacity-75 py-3">
        <p class="text-center m-auto">&copy; 2024 | Designed and developed by <a
                href="https://www.linkedin.com/in/shirsendu-mali-a61353230/"
                class="link-dark link-opacity-75 link-opacity-100-hover text-decoration-none">Shirsendu Mali</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>