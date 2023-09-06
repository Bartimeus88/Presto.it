<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
          @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('categoryShow', compact('category')}}">{{$category->name}}</a></li>
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
            <form action="/logout" method="post">
            @csrf
            <input type="submit btn btn-primary" value="Logout">
          </form>
        @endif
      </ul>
    </div>
  </div>
</nav>