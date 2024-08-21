<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management System</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>

<body>
    <div class="min-vh-100">
        <!-- Main -->
        <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
            <h2 class="text-center fw-bold">LEAVE MANAGEMENT SYSTEM</h2>
            <p class="text-center mt-1 mb-2 col-10">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem odit similique esse earum doloribus
                voluptatibus! Cupiditate, consectetur maiores! Non, aliquam!
            </p>
            <a href="{{route('account.login')}}" class="btn custom-btn mt-3" role="button">Proceed</a>
        </div>

        <!-- Footer -->
        <footer class="fixed-bottom text-dark text-opacity-75 py-3">
            <p class="text-center m-auto">&copy; 2024 | Designed and developed by <a
                    href="https://www.linkedin.com/in/shirsendu-mali-a61353230/"
                    class="link-dark link-opacity-75 link-opacity-100-hover text-decoration-none">Shirsendu Mali</a></p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>