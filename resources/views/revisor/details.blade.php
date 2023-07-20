<x-layout>
    <x-header>
        @if (Auth::user()->is_revisor)
            Linee guida sui contenuti idonei
        @else
            Vuoi collaborare con noi? Diventa revisore!
        @endif
    </x-header>
    <div class="container-fluid">

        
        <div class="row justify-content-center">
            <div class="col-12 col-md-2 text-center justify-content-center d-column font-p">
                <h4>Linguaggio inappropriato</h4>
                <p>
                    I contenuti che includono linguaggio volgare o blasfemo all'inizio del video o per gran parte della sua durata potrebbero non essere idonei per la pubblicità. L'uso occasionale di un linguaggio volgare (ad esempio nei video musicali) non è necessariamente motivo per considerare il tuo video non adatto per la pubblicità.</p>
                </div>
                
                <div class="col-12 col-md-2 text-center justify-content-center d-column font-p">
                    <h4>Violenza</h4>
                    
                    <p>I contenuti in cui l'attenzione è concentrata su sangue, violenza o lesioni, senza un adeguato contesto, non sono idonei per la pubblicità. Se mostri contenuti violenti in un notiziario o in un video con finalità didattiche, artistiche o documentaristiche, il contesto aggiuntivo fa la differenza. </p>
                </div>
                
                <div class="col-12 col-md-2 text-center justify-content-center d-column font-p">
                    <h4>Contenuti per adulti</h4>
                    <p> I contenuti che presentano un titolo o una miniatura con una forte connotazione sessuale oppure che trattano temi con una forte connotazione sessuale non sono idonei per la pubblicità. Sono ammesse delle eccezioni, seppur limitate, in caso di video finalizzati all'educazione sessuale e video musicali che non presentino immagini crude, comprese immagini sia reali sia generate da computer.</p>
                </div>
                
                <div class="col-12 col-md-2 text-center justify-content-center d-column font-p">
                    <h4>Contenuti correlati a farmaci e sostanze stupefacenti per uso ricreativo</h4>
                    <p>I contenuti che promuovono o mostrano la vendita, il consumo o l'abuso di sostanze stupefacenti illegali, sostanze o farmaci legali regolamentati o altri prodotti pericolosi non sono adatti per la pubblicità. 
                    </p>
                </div>
                
                <div class="col-12 col-md-2 text-center justify-content-center d-column font-p">
                    <h4>Contenuti dispregiativi e che incitano all'odio</h4>
                    <p>I contenuti che incitano all'odio, alla discriminazione, alla denigrazione o all'umiliazione nei confronti di un individuo o di un gruppo di persone non sono idonei per la pubblicità. I contenuti satirici o umoristici potrebbero non rientrare in questa casistica. Dichiarare un intento umoristico non è sufficiente e tali contenuti potrebbero comunque non essere idonei per la pubblicità.</p>
                </div>
            </div>
            @if (Auth::user()->is_revisor)
            @else
                <div class="row text-center justify-content-center">
                    <div class="col-10 col-md-4 d-column justify-content-center text-center bg-dark rounded p-3 my-2">
                        <h5 class="font-p tx-p"> I revisori hanno la possibilità di aiutarci a controllare gli annunci pubblicati dagli utenti, visualizzare l'annuncio e assicurarsi che rispetti le regole della community.</p>
                        </h5>
                        <a href="{{route('become.revisor')}}" class=" font-p btn-toolset">{{__('ui.become-revisor')}}</a>
                    </div>
                </div>
            @endif
        </div>
        
        
        
        
        
        
        
        
    </x-layout>