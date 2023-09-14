<x-layout>
    @if(session('successMessage'))
    <div class="container">
        <div>
            <p>{{ session('successMessage') }}</p>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2">
                    {{ $announcement_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>
            </div>
        </div>
    </div>

    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="card col-12">
                <div id="carouselExample" class="carousel slide mb-4">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $announcement_to_check->title }}</h5>
                    <p class="card-text text-truncate">{{ $announcement_to_check->description }}</p>
                    <p class="card-text">{{ $announcement_to_check->price }}</p>
                    <a href="#" class="btn btn-primary">Visualizza</a>
                    <p class="card-footer">Pubblicato il: {{ $announcement_to_check->created_at->format('d/m/Y') }}
                        - Autore: {{ $announcement->user->name ?? '' }}</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="{{ route('revisor.accept_announcement',['announcement'=>$announcement_to_check]) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success shadow">Accetta</button>
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="{{ route('revisor.reject_announcement',['announcement'=>$announcement_to_check]) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger shadow">Rifiuta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container py-5 ">
       <div class="row">
        <!-- ANNULLA ULTIMA MODIFICA -->
       <div class="col-6 d-flex justify-content-center">
            <form action="{{ route('editRevisor') }}" method="POST">
                @csrf
                @method('PUT')
                <input class="btn btn-primary" type="submit" value="Annulla Modifica">
            </form>
        </div>
        <!-- MODALE DI RIEPILOGO -->
        <div class="col-6 d-flex justify-content-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Riepilogo">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Riepilogo" tabindex="-1" aria-labelledby="RiepilogoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="RiepilogoLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal content here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Dettaglio</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</x-layout>
