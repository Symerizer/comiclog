<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Menu</h3>
                        <ul>
                            <li><a href="">Issues</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <h1>Content</h1>
                    </div>
                </div>
            </div>
        </div>
        <script type="application/javascript" src="/js/app.js"></script>
    </body>
</html>