<?php

namespace App\Listeners;

use App\Events\CamperRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CampRegistrationConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCampRegistrationConfirmation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CamperRegistered $event): void
    {
        //
        $registrant = $event->registrant;
        
        // Access the registrant's data
        $email = $registrant->email;
        // $firstname = $registrant->firstname;
        // $registrationCode = $registrant->registration_Code;
        // Add your logic here, e.g., sending an email

        Mail::to($email)
        ->send(new CampRegistrationConfirmation($registrant));
    }
}
