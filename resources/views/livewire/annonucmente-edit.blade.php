<div>
   
   
<!-- Se l'utente che prova a modificare l'annuncio è lo stesso che lo ha creato può procedere -->
@if($announcement->user_id==Auth::id())
 <div class="container">
    <div class="row justify-content-center">
        <!-- Anteprima modifiche -->
        <div class="col-6"></div>
        <!-- form per le modifiche -->
        <div class="col-12 col-md-6">
        <div class="container my-5">
        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                    <div class="flex flex-row justify-center my2 alert alert-success">
                    {{session('message')}}
                    </div>
                @endif
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="card col-12">
                        <div class="card-body">
                            
                        <div class="card-title text-center display-5 my-3">Modifica Annuncio</div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input value="{{$announcement->title}}" wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" >
                                @error('title')
                                    {{$message}}
                                @enderror    
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10">{{$announcement->description}}</textarea>
                                @error('description')
                                    {{$message}}
                                @enderror  
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo</label>
                                <input value="{{$announcement->price}}"  wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" >
                                @error('price')
                                    {{$message}}
                                @enderror  
                            </div>
                            <div class="mb-4">
                                <label for="category">Categoria</label>
                                <select wire:model.defer="category" id="category" class="form-select @error('price') is-invalid @enderror" aria-label="Default select example">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $announcement->category->id ? 'selected' : '' }} >{{$category->name}}</option>
                                @endforeach
                                </select>
                                @error('category')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                                @error('temporary_images.*')
                                    {{$message}}
                                @enderror
                            </div>
                            @if(!empty($images))

                            <div class="row">
                                <div class="col 12">
                                    <p>photo preview</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach($images as $key => $image)
                                            <div class="col my-3">
                                                 <div class="mx-auto shadow rounded img-preview" style="background-image:url({{$image->temporaryUrl()}});">
                                                    <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                                </div>
                                        @endforeach
                                         </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-auto">
                                <button wire:click='store' type="button" class="btn btn-primary mb-3">Aggiungi</button>
                            </div> 
                            <p class="{{$color}}">{{$text}}</p>  
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
 </div>
<!-- messaggio in cui un utente cerchi di modificare un annuncio che non ha pubblicato -->
@else
    <div class="container my-5 py-5">
        <p class="fs-1 text-center">
            Non sei autorizzato a modificare questo Annuncio
        </p>
    </div>
@endif


</div>
