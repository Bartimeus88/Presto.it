<x-layout>
    <x-navbar/>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Tutti gli annunci della categoria {{$category->name}}</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                    
                        <div class="col-12 col-lg-4">
                            <div class="card shadow-lg mb-4">
                            <img src="http://picsum.photos/200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->description}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="#" class="btn btn-primary">Visualizza</a>
                                    <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-12">
                        <p class="h1 text-center">Non sono presenti annunci per questa categoria</p>
                        <p class="h2 text-center">pubblicane uno : <a class="btn btn-primary shadow" href="{{route('announcements.create')}}">Nuovo Annuncio</a></p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>


</x-layout>