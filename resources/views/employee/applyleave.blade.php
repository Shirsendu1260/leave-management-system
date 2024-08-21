<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS • Apply For Leave</title>
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
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / APPLY FOR LEAVE</div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav justify-content-end flex-grow-1 me-auto my-1 my-md-0 my-lg-0 px-2 navbar-nav-scroll"
                        style="--bs-scroll-height: auto">
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link logout" href="{{route('account.logout')}}">Logout</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link" href="{{route('account.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0 d-flex align-items-center">
                            <div class="nav-link">Welcome, <span class="custom-bg-text"
                                    style="font-weight: 500;">{{Auth::user()->name}}</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container px-4">
            <div class="card shadow">
                <div class="custom-bg rounded-top">
                    <h5 class="m-0 p-3 text-white">Apply For Leave</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('hr.submitapplication')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                @if(Session::has('success'))
                                <div class="alert alert-success shadow mb-4 w-100">{{Session::get('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-4">
                                <label class="form-label">From</label>
                                <input type="date" class="form-control shadow-none @error('from') is-invalid @enderror"
                                    id="start" name="from">
                                @error('from')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label class="form-label">To</label>
                                <input type="date" class="form-control shadow-none @error('to') is-invalid @enderror"
                                    id="end" name="to">
                                @error('to')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label class="form-label">Day Count</label>
                                <input type="text" class="form-control shadow-none @error('day') is-invalid @enderror"
                                    id="day_count" name="day" readonly>
                                @error('day')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Reason</label>
                                <textarea name="reason"
                                    class="form-control shadow-none @error('reason') is-invalid @enderror" rows="3"
                                    style="resize: none;"></textarea>
                                @error('reason')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn custom-btn">Apply</button>
                            <a href="{{route('account.dashboard')}}" class="btn btn-dark">Back</a>
                        </div>
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function calculateDays() {
            // Get start and end dates
            const start = new Date($('#start').val());
            const end = new Date($('#end').val());

            if (start && end) {
                // Get the day count between the dates
                const diff = end - start;
                const totalMs = 1000 * 3600 * 24; // Total milliseconds in a day
                const day = diff / totalMs;

                // Write the day count back in the input field of 'Day Count'
                $('#day_count').val(day);
            }
            else {
                $('#day_count').val('');
            }
        }

        $('#start, #end').on('change', calculateDays);
    </script>
</body>

</html>