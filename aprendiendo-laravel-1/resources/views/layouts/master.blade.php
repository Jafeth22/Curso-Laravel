<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- yield this is a variable I will use next, to fill with a name -->
    <title>Testing Laravel - @yield('title')</title>
</head>
<body>
    <!-- This view I will be able to use in any another view, this is the master view -->
    @section('header')
        MASTER HEADER
    @show

    <div class="container">
        @yield('content')
    </div>

    @section('footer')
        MASTER FOOTER
    @show
</body>
</html> 