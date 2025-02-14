<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ONCF')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content-wrapper {
            min-height: 80vh;
            padding: 40px 0;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>

    <!-- Include Navbar -->
    @include('Menu')

    <!-- Main Content -->
    <div class="container content-wrapper">
        @yield('content')
    </div>

    <!-- Include Footer -->
    @include('Footer')

    <!-- Bootstrap 5 Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>
</html>
