<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-1 text-center">
                    Ecco i nostri annunci
                </h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <div class="card shadow-lg my-4">
                        <img src="http://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titolo : {{ $announcement->title }}</h5>
                            <p class="card-text text-truncate">Descrizione : {{ $announcement->description }}</p>
                            <p class="card-text">Prezzo : {{ $announcement->price }} €</p>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-primary">Visualizza</a>
                            <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
                                class="card-link btn btn-success shadow">Categoria:
                                {{ $announcement->category->name }}</a>
                            <p class="card-footer">Pubblicato il: {{ $announcement->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="h1 text-center">Non sono presenti annunci</p>
                    <p class="h2 text-center">pubblicane uno : <a class="btn btn-primary shadow"
                            href="{{ route('announcements.create') }}">Nuovo Annuncio</a></p>
                </div>
            @endforelse
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                    </div>{{ $announcements->links() }}
                </div>
            </div>

        </div>
    </div>

    {{-- codice inserito da Gellart --}}
    {{--<x-navbar />

    <section id="page-header">

        <h2 class="text-dark">Ecco</h2>
        <h2 class="text-dark">I</h2>
        <h2 class="text-dark">Nostri annunci</h2>
    </section>


    <section id="product1" class="section-p1">
        <div class="pro-container">
            @foreach ($announcements as $announcement)
                <div class="pro" onclick="window.location.href='sproduct.html'>
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

--}}

</x-layout>
