<x-layout>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
               <h1> Benvenuto {{auth()->user()->name}} </h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <h1 class="text-center">I tuoi annunci verificati</h1>
            @foreach ($announcements as $announcement)
                <div class="col-12 col-lg-4">
                    <div class="card shadow-lg my-4">
                        <div class="image_with_badge_container">
                        <img src="{{$announcement->images()->first()->getUrl(400, 300)}}" class="card-img-top" alt="...">
                        @if($announcement->is_accepted == 1)
                        <span class="badge text-bg-success px-3 py-2 badge-on-image">VERIFICATO</span>
                        @elseif($announcement->is_accepted == NULL)
                        <span class="badge text-bg-warning px-3 py-2 badge-on-image">DA VERIFICARE</span>
                        @else
                        <span class="badge text-bg-danger">RIFIUTATO</span>
                        @endif
                        </div>
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
                            <div class="col-12 row justify-content-center">
                                <div class="col-6">
                                    <a class="text-center" href="{{route('announcements.edit', [$announcement->id])}}">Modifica</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('announcements.destroy', [$announcement->id])}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <input type="submit" value="elimina">
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
        </div>
    </div>

</x-layout>