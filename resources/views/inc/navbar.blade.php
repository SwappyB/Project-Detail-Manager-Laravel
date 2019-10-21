
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('storage/mainLogo.png') }}" style="border-radius:0.5em" height="40px" width="40px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        {{-- <li class="nav-item active large">
          <a class="nav-link" style="font-size:1.2em;font-family: 'Open Sans', sans-serif;" href="/">Home <span class="sr-only">(current)</span></a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" style="font-size:1.2em;font-family: 'Open Sans', sans-serif;" href="/home">Dashboard</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link"  style="font-size:16px;" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" style="font-size:16px;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" style="font-size:16px;" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" style="font-size:16px;" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" style="font-size:16px;" href="{{ route('register') }}">{{ __('Add new User') }}</a>
                </li>
              @endif
          @endguest
      </ul>
  </div>
</nav>