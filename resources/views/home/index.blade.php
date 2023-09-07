<x-layout>
   <x-navbar/>

    <h1 class="display-1 text-center my-5">Presto.it</h1>

    @if (auth()->check()) 
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body my-5">
                    <div class="col-12 text-center display-4 mb-4">
                        Crea il tuo annuncio
                    </div>
                    <div class="col-12 text-center">
                    <a class="btn shadow-lg btn-primary px-2 py-2" href="{{route('announcements.create')}}">Crea il tuo annuncio personalizzato</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif

   <div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h3 class="text-center fw-bold">Annunci Recenti</h3>
        </div>
        @foreach ($announcements as $announcement)
        <div class="col-12 col-lg-4">
            <div class="card shadow-lg">
            <img src="http://picsum.photos/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$announcement->title}}</h5>
                <p class="card-text">{{$announcement->description}}</p>
                <p class="card-text">{{$announcement->price}}</p>
                <a href="#" class="btn btn-primary">Visualizza</a>
                <a href="#" class="card-link btn btn-success shadow">Categoria:</a>
                <p class="card-footer">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
        </div>
        @endforeach
    </div>
   </div>


</x-layout>
