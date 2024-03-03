<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Assignment</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.cs
s" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <div class="container" >
        <div class="col-md-12">
            <nav class="navbar navbar-default" style="background: linear-gradient(90deg, hsla(284, 100%, 33%, 1) 14%, hsla(345, 74%, 58%, 1) 50%, hsla(255, 84%, 36%, 1) 100%);">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile

display -->

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span>

                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('dashboard') }}" style="color: white">Online Assignment</a>

                    </div>
                    <!-- Collect the nav links, forms, and other content

for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-weight: 700">

                        <ul class="nav navbar-nav navbar-left" >
                            @if (Auth::user()->role == 'guru')
                                <li class="nav-item"><a class="nav-link" href="/user" style="color: white">User</a></li>
                            @endif

                            <li class="nav-item"><a class="nav-link" href="/soal" style="color: white">Tugas</a></li>

                            <li class="nav-item"><a class="nav-link" href="/nilai"c style="color: white">Nilai</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white"><i class="fa fa-user"></i>
                                    {{ Auth::user()->email }}

                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{ Auth::user()->role }}</a>

                                    </li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{ route('aksilogout') }}"><i class="fa fa-power-off"></i> Log
                                            Out</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            @yield('konten')
        </div>
    </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>
