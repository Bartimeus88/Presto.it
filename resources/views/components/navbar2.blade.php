<nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
  <div class="container ">
    <!-- Logo che riporta alla Hompage -->
    <a class="navbar-brand" href="/">Navbar</a>
    <!-- Menu a tendina responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link click-scroll text-dark" href="{{ route('announcements.index') }}">Annunci</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
            @foreach ($categories as $category)
              <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <!-- Visibile solo se si è revisori e registrati -->
        @if (auth()->check() && Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link active btn btn-outline-success btn-sm position-relative" aria-current="page" href="{{route('revisor.index')}}">Zona revisore
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">unread messages</span>
              </span>
            </a>
          </li>
        @endif
        @if (!auth()->check())
          <li class="nav-item">
            <a class="nav-link text-dark" href="/login">Accedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/register">Registrati</a>
          </li>
        @else
          <li class="nav-item mx-4">
            <form action="/logout" method="post">
              @csrf
              <input type="submit" value="Logout">
            </form>
          </li>
        @endif
        <form action="{{route('announcements.search')}}" method="get" class="d-flex">
          <input name="searched" type="search" class="form-control me-2" placeholder="Ricerca" aria-label="Ricerca">
          <button class="btn btn-outline-success" type="submit">Ricerca</button>
        </form>
      </ul>
    </div>
  </div>
</nav>
