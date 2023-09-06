<x-layout>
<x-navbar/>


<div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card p-5">
                    <div class="card-title text-center display-5">Registrati</div>
                    <form action="/register" method="post">
                        @csrf
                    <div class="mb-3">
                    <label class="form-label" for="name">Nome Completo</label>
                    <input class="form-control" type="name" name="name" id="name">
                    </div>    
                    <div class="mb-3">
                        <label for="email" class="form-label">Inserisci l'email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Inserisci la password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma la password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                    </form>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-layout>