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
                @if($announcement->is_accepted==1)
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
                @endif
                @endforeach
           
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <h1 class="text-center">I tuoi annunci non verificati</h1>
            @foreach ($announcements as $announcement)
                @if($announcement->is_accepted==null)
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
                @endif
            @endforeach
        </div>
    </div>



</x-layout>