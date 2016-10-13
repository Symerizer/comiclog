<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div class="container fill">
    <div class="row">
        <div id="menu" class="col-md-2">
            <h2>ComicLog</h2>
            <ul>
                <li><a href="#">My characters</a></li>
            </ul>
                <div id="user-info">
                    <div class="wrapper-update">
                    @if (Auth::guest())
                        <form action="{{ url('/login') }}">
                            <button class="btn btn-default btn-block btn-login">Login</button>
                        </form>
                        <form action="{{ url('/register') }}}}">
                            <button class="btn btn-primary btn-block">Register</button>
                        </form>
                    @else
                        <div>Current user: {{ Auth::user()->name }}</div>
                        <div class="logout-btn">
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                <button class="btn btn-success btn-block">Logout</button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endif
                    </div>
                </div>
        </div>
        <div id="content" class="col-md-10">
            <div id="search">
                <searchbar></searchbar>
                @yield('content')
            </div>
        </div>
    </div>
</div>


<script type="application/javascript" src="/js/app.js"></script>
</body>
</html>
