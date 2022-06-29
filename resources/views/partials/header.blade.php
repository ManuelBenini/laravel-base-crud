<header>
    <div class="container d-flex justify-content-center py-2">
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() === 'home'? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Homepage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() === 'Comics.index'? 'active' : ''}}" href="{{route('Comics.index')}}">Lista Comics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() === 'Comics.create'? 'active' : ''}}" href="{{route('Comics.create')}}">Crea nuovo Comic</a>
            </li>
          </ul>
    </div>
</header>