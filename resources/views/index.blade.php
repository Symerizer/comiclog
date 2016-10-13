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
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="container fill">
                <div class="row">
                    <div id="menu" class="col-md-2">
                        <h2>ComicLog</h2>
                        <ul>
                            <li><a href="#">Lorem</a></li>
                        </ul>
                    </div>
                    <div id="content" class="col-md-10">
                        <div id="search">
                            <searchbar></searchbar>
                        </div>
                    </div>
                </div>
            </div>


        <script type="application/javascript" src="/js/app.js"></script>
    </body>
</html>
