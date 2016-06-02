<nav class="navbar nav-mantenimiento">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Mantenimiento</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('registerCarIndex') }}">AUTOMOVIL</a></li>
                <li><a href="{{ route('timeLineIndex') }}">TIME LINE</a></li>
                <li><a href="{{ route('historyIndex') }}">HISTORIAL</a></li>
                <li><a href="{{ route('userProfile') }}">USUARIO</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="cnt-banner">
    <img src="{{ asset('assets/img/banner.png') }}" class="img-responsive img-banner">
</div>