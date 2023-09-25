<div>
    <div class="container">
        <div class="row fw-bolder border">
            <div class="col-2 border text-truncate">
                <p>Autore</p>
            </div>
            <div class="col-2 border text-truncate">
                <p>Titolo</p>
            </div>
            
            <div class="col-2 border text-truncate">
                <p>Revisionato da</p>
            </div>
            <div class="col-2 border text-truncate">
                <p>Approva</p>
                
            </div>
            <div class="col-2 border text-truncate">
                <p> Rifiuta</p>
               
            </div>
            <div class="col-2 border text-truncate">
                <p>Annulla</p>
                
            </div>
            
        </div>
        <div class="row border text-truncate">
            @foreach($announcements as $announcement)
                <!-- autore -->
                <div class="col-2 text-truncate border ">
                    <p>
                        {{$announcement->user->name}}
                    </p>
                    

                </div>
                <!-- titolo -->
                <div class="col-2 text-truncate border">
                    <p>
                        {{$announcement->title}}
                    </p>
                  
                </div>
                 <!-- Revisore -->
                <div class="col-2 border text-truncate">
                    @foreach($users as $user)
                        @if($announcement->user_revisor_id==$user->id)
                            {{$user->name}}
                        @endif
                    @endforeach

                </div>
                <div class="border text.truncate col-2"></div>
                <div class="border text.truncate col-2"></div>
                <div class="border text.truncate col-2"></div>
            @endforeach
        </div>
    </div>
</div>
