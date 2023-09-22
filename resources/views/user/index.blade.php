<x-layout>
    <div class="py-5"></div>

    <h1  class="text-center">LE INFORMAZIONI DEL TUO PROFILO</h1>

    <h2  class="text-center mt-5">MODIFICA DATI UTENTE</h2>
    <!-- Form per modificare dati utente -->
    <form class="container row justify-content-center mx-auto mt-2" method="POST" action="/user/profile-information">
        @csrf
        @method('PUT')
        <div class="mb-3 row" >   
        <div class="col-12 col-md-6">
                <label for="name" class="form-label ">Nome</label>     
                <input type="text" name="name" class="form-control mb-3" id="name" value="{{auth()->user()->name}}">
            </div>
            <div class="col-12 col-md-6">
                <label for="email" class="form-label ">email</label>     
                <input type="email" name="email" class="form-control mb-3" id="email" value="{{auth()->user()->email}}">
            </div>
            
        </div>   
        <button type="submit" class="btn btn-primary col-3">Aggiorna</button>
    </form>
    <!-- Form Modifica password -->
    <h2  class="text-center mt-5">MODIFICA PASSWORD</h2>
    <form class="container row justify-content-center mx-auto mt-2" method="POST" action="/user/password">
        @csrf
        @method('PUT')
        <div class="mb-3 row" >  
            <div class="col-12 col-md-6">
                <label for="current_password" class="form-label ">Password attuale</label>    
                <input type="password" name="current_password" class="form-control mb-3"   id="current_password"  >    
            </div>   
            <div class="col-12 col-md-6">
                <label for="password" class="form-label ">Password</label>    
                <input type="password" name="password" class="form-control mb-3"   id="password"  >    
            </div>     
            <div class="col-12 col-md-6">
                <label for="password_confirmation" class="form-label ">Conferma password</label>    
                <input type="password" name="password_confirmation" class="form-control mb-3"   id="password_confirmation"  >    
            </div> 
            
            
            
        </div>   
        <button type="submit" class="btn btn-primary col-3">Aggiorna password</button>
    </form>



    <!-- Abilitazione autentificazione a 2 fattori -->
    <h2  class="text-center mt-5">ABILITAZIONE AUTENTIFICAZIONE A DUE FATTORI</h2>
    <div class="container mt-5">
    <div class="row justify-content-center text-center">
        @if (auth()->check())
        @if(session('status')=="two-factor-authentication-disabled")
     <p class="text-color-success">il sistema di autentificazione a due fattori è stato disabilitato</p>
        @endif
        @if(session('status')=="two-factor-authentication-enabled")
     <p class="text-color-success">il sistema di autentificazione a due fattori è stato abilitato</p>
        @endif
        
            <form method="POST" action="/user/two-factor-authentication">
                @csrf
                @if(auth()->user()->two_factor_secret)
                    @method('DELETE')
                    <div>
                        {{!!auth()->user()->twoFactorQrCodeSvg()!!}}
                    </div>
                    <!-- @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                     <p>{{$code}}</p>
                    @endforeach -->
                 <button class="btn btn-primary col-3 my-5">Disabilita</button>
                @else
                    <!-- input che fa inviare l'email in caso di click su abilita -->
                    <input type="hidden" name="disable" value="true">
                    <button class="btn btn-primary col-3 my-5">Abilita</button>   

                @endif
            </form>
        @endif


    </div>
    </div>

</x-layout>