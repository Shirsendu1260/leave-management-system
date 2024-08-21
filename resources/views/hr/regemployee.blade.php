<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS • Register Employee</title>
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
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / REGISTER EMPLOYEE</div>
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
        <div class="container px-4">
            <div class="card shadow">
                <div class="custom-bg rounded-top">
                    <h5 class="m-0 p-3 text-white">Register An Employee</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('hr.doemregister')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" placeholder="User Name" value="{{ old('name') }}">
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" name="email"
                                    placeholder="email@exmaple.com" value="{{ old('email') }}">
                                @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Confirmed Password</label>
                                <input type="password" class="form-control shadow-none @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select shadow-none @error('gender') is-invalid @enderror" name="gender">
                                            <option selected>Select</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('gender')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Role</label>
                                        <select class="form-select shadow-none @error('role') is-invalid @enderror" name="role">
                                            <option selected>Select</option>
                                            <option value="HR" {{ old('role') == 'HR' ? 'selected' : '' }}>HR</option>
                                            <option value="Employee" {{ old('role') == 'Employee' ? 'selected' : '' }}>Employee</option>
                                        </select>
                                        @error('gender')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none @error('address') is-invalid @enderror" rows="3" style="resize: none;"
                                    placeholder="XYZ Street, State, Country">{{ old('address') }}</textarea>
                                @error('name')
                                <p class="invalid-feedback">{{ $address }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Department</label>
                                <select class="form-select shadow-none @error('dept') is-invalid @enderror" name="dept">
                                    <option selected>Select</option>
                                    <option value="Information Technology" {{ old('dept') == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                                    <option value="Sales & Marketing" {{ old('dept') == 'Sales & Marketing' ? 'selected' : '' }}>Sales & Marketing</option>
                                    <option value="Finance & Accounting" {{ old('dept') == 'Finance & Accounting' ? 'selected' : '' }}>Finance & Accounting</option>
                                    <option value="Human Resources" {{ old('dept') == 'Human Resources' ? 'selected' : '' }}>Human Resources</option>
                                </select>
                                @error('dept')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label class="form-label">Photo</label>
                                <input type="file" class="form-control shadow-none @error('photo') is-invalid @enderror" name="photo">
                                @error('photo')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn custom-btn">Submit</button>
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