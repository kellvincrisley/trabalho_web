<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="kelvin krilslley & neto">
    <meta name="generator" content="kelvin krilslley & neto">
    <title>PROJETOLARAVEL8</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">PROJETOLARAVEL8</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('casacategorias.index') }}">Casa Categorias</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('imobiliarias.index') }}">Imobiliarias</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('locadores.index') }}">Locadores</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('casas.index') }}">Casas</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('locacoes.index') }}">Locacoes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container" style="margin-top: 80px !important;">
            @yield('body')
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <span class="pull-right">
                        Desenvolvido por Kellvin Crisley & Salviano Neto
                    </span>
                </div>
            </div>

            @yield('footer')
        </div>
    </footer>


</body>

</html>
