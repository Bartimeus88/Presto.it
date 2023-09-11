<x-layout>
    <x-navbar2 />

    {{-- <h1 class="display-1 text-center my-5">Presto.it</h1> --}}



    {{-- hero --}}
    {{-- <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Presto.it</h1>

                    <h6 class="text-center">platform for creatives around the world</h6>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5 d-none" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">

                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section> --}}


    @if (session()->has('access.denied'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-danger">
                {{ session('access.denied') }}
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="container">
            <div class="my-5 flex flex-row justify-center my2 alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if (auth()->check())
        {{-- <div class="container my-5">
            <div class="row">
                <div class="card">
                    <div class="card-body my-5">
                        <div class="col-12 text-center display-4 mb-4">
                            Crea il tuo annuncio
                        </div>
                        <div class="col-12 text-center">
                            <a class="btn shadow-lg btn-primary px-2 py-2"
                                href="{{ route('announcements.create') }}">Crea
                                il tuo annuncio personalizzato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- sezione hero contenente bottone che porta alla creazione annuncio --}}
        <section id="hero">
            <h4>Test</h4>
            <h4>Test</h4>
            <h4>Test</h4>
            <p>Test</p>

            <button>
                <a href="{{ route('announcements.create') }}" class="text-dark">Crea il tuo annuncio</a>
            </button>

        </section>
    @endif

    {{-- categorie annunci --}}
    <section id="feature" class="section-p1">
        <section id="feature">
            <div class="fe-box">
                <img src="./images/f1.png" alt="">
                <h6>test</h6>
            </div>
        </section>
    </section>

    {{-- vecchi ultimi  annunci --}}
    {{-- <div class="container">
        <div class="row">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">Last announcements</h1>
                    </div>

                </div>
            </div>
            @foreach ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <div class="card shadow-lg my-4">
                        <img src="http://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titolo : {{ $announcement->title }}</h5>
                            <p class="card-text text-truncate">Descrizione : {{ $announcement->description }}</p>
                            <p class="card-text mb-2">Prezzo : {{ $announcement->price }} €</p>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-primary">Visualizza</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="mb-2 card-link btn btn-success shadow">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    {{-- nuovi ultimi  annunci (ragazzi non chiedetemi perchè li ho chiamati product) --}}
    <section id="product1" class="section-p1">
        <h2>Ultimi annunci</h2>
        <p>Dai una occhiata!!</p>
        <div class="pro-container">
            @foreach ($announcements as $announcement)
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>{{ $announcement->title }}</h5>
                        <p class="text-truncate">{{ $announcement->description }}</p>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>{{ $announcement->price }}</h4>
                        <button type="button" class="btn btn-primary"><a class="text-white"
                                href="{{ route('announcements.show', $announcement->id) }}">Visualizza</a></button>
                        <button type="button" class="btn btn-primary"><a class="text-white "
                                href="{{ $announcement->category->name }}">Categorie</a></button>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="display-2 col-12">LAVORA CON NOI</h2>
                <a href="{{ route('request.revisor') }}" class="btn btn-lg btn-primary">CLICCA QUI</a>
            </div>
        </div>
    </div>

    <x-footer />

</x-layout>
