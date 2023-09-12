<x-layout>
    <!-- vista per email di verifica -->
    <p>{{auth()->user()->name}} è stata inviata una mail di conferma all'indirizzo {{auth()->user()->email}}  </p>

    <!-- form per invio nuova email -->
    <form action="/email/verification-notification" method="post">
      
        <!-- input per l'ivio di una nuova email di verifica -->
        <input type="submit" value="invia una nuova email">
    </form>
</x-layout>