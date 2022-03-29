<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  <!-- Import a fonte awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand">Flight Club</span>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('socios.index')}}">Sócios</a></li>
            <li><a href="{{route('aeronaves.index')}}">Aeronaves</a></li>
            <li><a href="{{route('movimentos.index')}}">Movimentos</a></li>
            <li><a href="{{route('aerodromos.index')}}">Aeródromos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('socios.editPassword')}}"><i class="fas fa-key"></i>
Alterar Palavra-Passe</a></li>
                    <li><a href="{{route('socios.edit', App\User::find(Auth::id()))}}"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
                    <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="jumbotron" style="background-color: rgb(48,117,173);">
            <h1 style="text-align: center"><span style="color: white; ">@yield('title')</span></h1>
        </div>
        @if (session('sucesso'))
            @include('shared.sucesso')
        @endif
        @if (session('erros'))
            @include('shared.erros')
        @endif
        @yield('content')
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>