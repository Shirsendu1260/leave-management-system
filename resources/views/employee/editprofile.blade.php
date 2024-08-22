<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS • Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body class="min-vh-100">
    <!-- Navbar + Main -->
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <nav class="fixed-top w-100 navbar navbar-expand-lg bg-body-tertiary shadow-sm shadow-bottom">
            <div class="container-fluid px-3">
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / EDIT PROFILE</div>
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
                    <h5 class="m-0 p-3 text-white">Edit Your Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('account.updateProfile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" value="{{old('name', $employee->name)}}" placeholder="User Name">
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" value="{{old('email', $employee->email)}}"
                                    placeholder="email@exmaple.com" readonly>
                                @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select shadow-none @error('gender') is-invalid @enderror">
                                    <option selected>Select</option>
                                    <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none @error('address') is-invalid @enderror" rows="3" style="resize: none;"
                                value="{{old('address', $employee->address)}}"placeholder="XYZ Street, State, Country"></textarea>
                                @error('address')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn custom-btn">Save</button>
                            <a href="{{route('hr.dashboard')}}" class="btn btn-dark">Back</a>
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
</body>

</html>