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
                    <a class="btn shadow-lg btn-primary px-2 py-2" href="/register">Crea il tuo annuncio personalizzato</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif



</x-layout>
