{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">Presto.it</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">Annunci</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
          @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{$category->name}}</a></li>
          @endforeach
          </ul>
        @if (!auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="/login">Accedi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Registrati</a>
        </li>
        @else
        <li class="nav-item">
            <form action="/logout" method="post">
            @csrf
            <input type="submit" value="Logout">
          </form>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="bi-back"></i>
            <span>Presto.it</span>
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="{{ route('announcements.index') }}">Annunci</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="#section_3">How it works</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="#section_4">FAQs</a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="#section_5">Contact</a>
                </li> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarLightDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if (!auth()->check())
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/login">Accedi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/register">Registrati</a>
                </li>
            @else
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <input type="submit" value="Logout">
                    </form>
                </li>
                @endif
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
