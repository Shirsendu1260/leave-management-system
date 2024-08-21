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
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="min-vh-100">
    <!-- Navbar + Main -->
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <nav class="fixed-top w-100 navbar navbar-expand-lg bg-body-tertiary shadow-sm shadow-bottom">
            <div class="container-fluid px-3">
                <div class="navbar-brand mx-2 fw-bold"><span class="custom-bg-text">L</span>MS / PENDING APPLICATIONS
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav justify-content-end flex-grow-1 me-auto my-1 my-md-0 my-lg-0 px-2 navbar-nav-scroll"
                        style="--bs-scroll-height: auto">
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link logout" href="">Logout</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0">
                            <a class="nav-link" href="hr_dashboard.html">Dashboard</a>
                        </li>
                        <li class="nav-item mx-lg-1 mb-1 mb-lg-0 d-flex align-items-center">
                            <div class="nav-link">Welcome, <span class="custom-bg-text"
                                    style="font-weight: 500;">HR</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container px-4">
            <div class="card shadow">
                <div class="custom-bg rounded-top">
                    <div class="d-flex justify-content-between m-0 p-3 text-white">
                        <h5 class="m-0 d-flex align-items-center">Pending Applications</h5>
                        <a href="hr_dashboard.html" class="btn btn-sm btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Day</th>
                                <th>Reason</th>
                                <th>Actions</th>
                            </tr>
                            <tr valign="middle">
                                <td>1</td>
                                <td>user.jpeg</td>
                                <td>User Name</td>
                                <td>F</td>
                                <td>test@gmail.com</td>
                                <td>Information Technology</td>
                                <td>DD-MM-YYYY</td>
                                <td>DD-MM-YYYY</td>
                                <td>3</td>
                                <td>Sick leave</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-sm custom-btn me-1">Approve</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
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