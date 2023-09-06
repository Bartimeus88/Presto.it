<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card col-12">
                <div class="card-body">
                <div class="card-title text-center display-5 my-3">Crea un nuovo Annuncio</div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input value="{{$title}}" wire:model="title" type="text" class="form-control" id="title" placeholder="scrivi il titolo dell'annuncio....">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea wire:model="description" class="form-control" id="description" rows="10" placeholder="scrivi la descrizione dell'annuncio....">{{$description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Titolo</label>
                        <input value="{{$price}}" wire:model="price" type="text" class="form-control" id="price" placeholder="scrivi il prezzo....">
                    </div>
                    <div class="col-auto">
                        <button wire:click='store' type="button" class="btn btn-primary mb-3">Aggiungi</button>
                    </div>
                    <p class="{{$color}}">{{$message}}</p>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>