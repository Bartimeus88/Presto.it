

<div class="card-body mt-2 mb-5">
    <form wire:submit.prevent="becomeRevisor">
        <div class="mb-3">
            <p class="card-text text-center h1 pb-3">Perchè dovremmo assumerti?</p>
            <label for="formMessage" class="form-label">Scrivi la tua richiesta</label>
            <textarea class="form-control @error('formMessage') is-invalid @enderror" wire:model="formMessage" name="formMessage" id="formMessage" rows="5" placeholder="Inserisci il tuo messaggio qui"></textarea>
            @error('formMessage')
                {{$message}}
            @enderror 
        </div>
        
        <div class="mb-3">
            <button class="btn btn-dark" type="submit">Invia Richiesta</button>
        </div>
        <p class="text-color-success">{{$feedback}}</p>
    </form>
</div>

