<x-layout>
   <x-navbar/>

    <h1 class="display-1 text-center my-5">Presto.it</h1>

    @if (auth()->check()) 
    <div class="container">
        <div class="row">
            <div class="col-12 text-center display-4 mb-4">
                Crea il tuo annuncio
            </div>
            <a class="btn btn-lg btn-primary" href="/login">Crea il tuo annuncio personalizzato</a>
        </div>
    </div>
   @endif



</x-layout>
