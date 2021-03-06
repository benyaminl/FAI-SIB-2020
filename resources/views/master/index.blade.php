<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('asset/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('asset/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('asset/css/select2.min.css') }}">

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('') }}">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if (Auth::check())
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ (url()->current() == url("/buku")) ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/buku") }}">@lang("Books") </a>
          </li>
          <li class="nav-item {{ url()->current() == url("/genre") ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/genre") }}">@lang("Genre")</a>
          </li>
          <li class="nav-item {{ url()->current() == url("/users") ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/users") }}">User</a>
          </li>
          <li class="nav-item {{ url()->current() == url("/penerbit") ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/penerbit") }}">@lang("Issuer")</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url("/logout") }}">@lang("Log Out")</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ App::getLocale() }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url("/lang/id") }}">ID</a>
              <a class="dropdown-item" href="{{ url("/lang/en") }}">EN</a>
            </div>
          </li>
        </ul>
      </div>
      @endif
    </nav>
    @section('content')
    @show
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('asset/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ url('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('asset/js/datatables.min.js') }}"></script>
    <script src="{{ url('asset/js/select2.full.min.js') }}"></script>

    {{-- @see https://laravel.com/docs/7.x/blade#stacks --}}
    @stack('js')
  </body>
</html>