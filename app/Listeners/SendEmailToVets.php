<?php

namespace App\Listeners;

use App\Events\NewAnimalRescue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ToNotifyVet;
class SendEmailToVets
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewAnimalRescue  $event
     * @return void
     */
    public function handle(NewAnimalRescue $event)
    {
        //  
        \Mail::to($event->vet->email)->send(
            new ToNotifyVet($event->vet, $event->animal)
        );
    }
}
