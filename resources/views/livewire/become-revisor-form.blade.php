

<div class="container py-5">
    <form wire:submit.prevent="becomeRevisor">
        <div class="mb-3">
            <label for="formMessage" class="form-label py-5">Dicci perchè dovremmo assumerti</label>
            <textarea class="form-control" wire:model="formMessage" name="formMessage" id="formMessage" rows="5" placeholder="Inserisci il tuo messaggio qui"></textarea>
        </div>
        
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Invia Richiesta</button>
        </div>
    </form>
</div>

