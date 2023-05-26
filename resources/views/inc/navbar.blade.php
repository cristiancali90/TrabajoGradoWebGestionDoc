<nav>
  <div class="nav-wrapper indigo darken-4">
    <a href="/" class="brand-logo center">
      <i class="material-icons">library_books</i>{{ config('app.name', 'EDMS') }}
    </a>
    <a href="#" data-activates="mobile-demo" class="button-collapse">
      <i class="material-icons">menu</i>
    </a>
    <!-- Mobile View -->
    <ul class="side-nav" id="mobile-demo">
      @if(Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Registro</a></li>
      @else
        <li><a href="/shared">Documentos compartidos</a></li>
        <li><a href="/documents">Documentos</a></li>
        <li><a href="/mydocuments">Mis documentos</a></li>
        <li><a href="/categories">Categorías</a></li>
        @hasanyrole('Root|Admin')
        <li><a href="/users">Usuarios</a></li>
        <li><a href="/departments">Áreas</a></li>
        <li><a href="/logs">Logs</a></li>
        @hasrole('Root')
        <!-- <li><a href="/backup">Backup</a></li> -->
        @endhasrole
        @endhasanyrole
        <li class="divider"></li>
        <li><a href="/profile">Mi perfil</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      @endif
    </ul>
    <!-- Desktop View -->
    <ul class="right hide-on-med-and-down">
      <!-- Authentication Links -->
      @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Registro</a></li>
      @else
        <!-- Dropdown Trigger -->
        <li>
          <a href="" class="datepicker"><i class="material-icons">date_range</i></a>
        </li>
        <li>
          @if($trashfull > 0)
          <a href="/trash"><i class="material-icons red-text">delete</i></a>
          @else
          <a href="/trash"><i class="material-icons">delete</i></a>
          @endif
        </li>
        @hasanyrole('Root|Admin')
        <li>
          <a href="/requests">Solicitudes<span class="new badge white-text">{{ $requests }}</span></a>
        </li>
        @endhasanyrole
        <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}
            <i class="material-icons right">arrow_drop_down</i>
          </a>
        </li>
      @endif
    </ul>
  </div>
</nav>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="/profile">Mi perfil</a></li>
  <li><a href="/mydocuments">Mis documentos</a></li>
  <li>
      <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </li>
</ul>
