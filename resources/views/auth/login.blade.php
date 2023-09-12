<x-layout>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="card-title text-center display-5">Accedi</div>
                <form action="/login" method="post">
                        @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Inserisci l'email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Inserisci la password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary mb-3">Accedi</button>
                <a class="btn btn-success" href="{{route('google.login')}}">Login with google</a>
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