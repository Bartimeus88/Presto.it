<x-layout>

    <!-- form per reset password -->
    <form action="/reset-password" method="post">
        @csrf
        <!-- input inserimento campo email -->
        <input type="email" name="email" id="email" placeholder="mario.rossi@gmail.com">
        <!-- input inserimento campo password -->
        <input type="password" name="password" id="password" placeholder="Passsword">
        <!-- input inserimento campo conferma password -->
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Conferma Passsword">
        <!-- valore token nascosto -->
        <input type="hidden" name="token" value="{{request()->route('token')}}">
        <!-- submit per reset password -->
        <input type="submit" value="invio conferma password">


    </form>

</x-layout>