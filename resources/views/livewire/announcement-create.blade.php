{{-- <div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                @if (session()->has('message'))
                    <div class="flex flex-row justify-center my2 alert alert-success">
                    {{session('message')}}
                    </div>
                @endif
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="card col-12">
                        <div class="card-body">

                        <div class="card-title text-center display-5 my-3">Crea un nuovo Annuncio</div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input value="{{$title}}" wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="scrivi il titolo dell'annuncio....">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10" placeholder="scrivi la descrizione dell'annuncio....">{{$description}}</textarea>
                                @error('description')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo</label>
                                <input value="{{$price}}" wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="scrivi il prezzo....">
                                @error('price')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="category">Categoria</label>
                                <select wire:model.defer="category" id="category" class="form-select @error('price') is-invalid @enderror" aria-label="Default select example">
                                <option selected>Scegli la categoria</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                            @if (!empty($images))

                            <div class="row">
                                <div class="col 12">
                                    <p>photo preview</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($images as $key => $image)
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
</div> --}}

<div class="container-fluid">
    <div class="row ">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image">
            {{-- <img src="{{ asset('images/create_announcement.png') }}" alt=""> --}}
        </div>


        <!-- The content half -->
        <div class="col-md-6 bg-white">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">Split page!</h3>
                            <p class="text-muted mb-4">Create a login split page using Bootstrap 4.</p>
                            <form>
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Remember password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                <div class="text-center d-flex justify-content-between mt-4"><p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted">
                                        <u>Boostrapious</u></a></p></div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

