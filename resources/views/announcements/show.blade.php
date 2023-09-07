<x-layout>
    <x-navbar/>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-2 text-center">Annuncio {{$announcement->title}}</h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card col-12">
                    <div class="card-body"> 
                        <div id="carouselExample" class="carousel slide mb-3">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="https://picsum.photos/id/27/1201/400" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1200/405" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="https://picsum.photos/id/27/1203/403" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="col-12">
                            <h5 class="card-title mb-3">Titolo:{{$announcement->title}}</h5>
                            <p class="class-text mb-3">Descrizione: {{$announcement->description}}</p>
                            <p class="class-text mb-3">Prezzo : {{$announcement->price}} €</p>
                            <a class="card-link btn btn-success shadow mb-5" href="{{route('categoryShow',['category'=>$announcement->category])}}">Categoria : {{$announcement->category->name}}</a>
                            <p class="card-footer">Pubblicato il : {{$announcement->created_at->format('d/m/Y')}} - Autore : {{$announcement->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>