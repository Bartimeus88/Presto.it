<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="display-2 text-center">Annuncio {{$announcement->title}}</h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card col-12">
                    <div class="card-body">
                        <div id="carouselExample" class="carousel slide mb-3">
                    <!-- immagini del carosello da cercare coun un if se non ci sono immagini caricate -->
                        @if($announcement->images && count($announcement->images)>0)
                    <div class="carousel-inner">
                        @foreach ($announcement->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{$image->getUrl(400,300)}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400/301" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400/300" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    @endif
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

    {{-- <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
        <div class="custom-block bg-white shadow-lg">
            <a href="topics-detail.html">
                <div class="d-flex">
                    <div>
                        <h5 class="mb-2">Annuncio {{$announcement->title}}</h5>

                        <p class="mb-0"></p>
                    </div>

                    <span class="badge bg-design rounded-pill ms-auto">14</span>
                </div>

                <img src="images/topics/undraw_Remote_design_team_re_urdx.png"
                    class="custom-block-image img-fluid" alt="">
            </a>
        </div>
    </div> --}}

</x-layout>
